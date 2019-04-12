<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Track;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    /* general  */
    public function object_traverse_recursive($tree_node , &$objects){
            $objects[]=$tree_node;
            foreach ($tree_node->child_ids as $child_id) {
                $child = Track::find($child_id);
                self::object_traverse_recursive($child,$objects);
            }
            return ;
    }



    public function track_traverse_recursive($tree_node , &$options){
        $node_options = "";
        //echo("tree_node ".$tree_node->name."\n");
        // if ($tree_node->level != "-1" ){ 
            $node_options .= "<option value =' " . $tree_node->_id . "'>";
            
        // }
        for($j = 0 ; $j < $tree_node->level ; $j++)
        {
            $node_options.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $node_options .= $tree_node->name . "</option>";
        $options.=$node_options;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Track::find($child_id);
            //echo("child ".$child->name."\n");
            //return;
            self::track_traverse_recursive($child,$options);
        }
        return ;
    }

    public function index()
    {
        //ordered as a tree ... (view)
        $tracks = [];
        $root = Track::where('name', 'root')->where('level',-1)->first();
        self::object_traverse_recursive($root , $tracks);
        return view("common.Track", ["tracks"=>$tracks]);
    }

    public function tracks_ordered()
    {
        //ordered as a tree ... (json)
        $tracks = [];
        $root = Track::where('name', 'root')->where('level',-1)->first();
        self::object_traverse_recursive($root , $tracks);
        $result['aaData'] = $tracks;
        return response()->json($result);
    }

    public function travesre_for_options()
    {
        $root = Track::where('name', 'root')->where('level',-1)->first();
        $root_opts = "";
        self::track_traverse_recursive($root , $root_opts);
        return response()->json($root_opts);
    }


    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:255',
            'parent_id' => 'max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }

        $parentID = $request->parentTrack;
        $parent = Track::where('_id', $parentID)->first();

        $request['parent_id'] = $parent['_id'];
        $request['level'] = $parent['level'] + 1;
        $request['child_ids'] = [];
        $new_track = new Track();
        $new_track->fill($request->all());
        $new_track->save();
        //updating parent
        $childs = $parent->child_ids;
        $childs[] = $new_track->_id;
        $parent->child_ids = $childs;
        $parent->save();
        //
        return response()->json($new_track);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $Track = Track::where('_id', $id)->first();
         
        return response()->json($Track);

    }
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'name'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }

            $Track = Track::where('_id', $id)->first();
}


    public function destroy($id)
    {
         Track::where('id', $id)->delete();
    }

    

}