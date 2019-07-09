var tablename=document.currentScript.getAttribute("tablename");
var website_url=document.currentScript.getAttribute("website_url"); 
var user_id=document.currentScript.getAttribute("user_id");
var exam_id=document.currentScript.getAttribute("exam_id");
var count = 0
var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({

			responsive: true,
			searchDelay: 500,
      		processing: true,
			serverSide: true,

       ajax:{url:website_url+"/"+tablename+"/"+exam_id, function (data, callback, settings) {
       }
       },
			columns: [

                {data: '_id' ,title: "#"},
                {data: 'name' ,title: "Title"},
                {data: 'status' ,title: "Status"},
                {data: 'pending_reports_count' ,title: "Pending reports"},
                {data: 'rejected_reports_count' ,title: "Rejeced reports"},
				{data: 'Actions',title: "Manage Reports"},
			],
			columnDefs: [
			{
					targets: 0,
					orderable: false,
			render: function(data, type, full  , meta) {
				count++;
				return "Q"+count;
			},
			},{
					targets: 1,
					orderable: false,
			},{
					targets: 2,
					orderable: false,
			},{
					targets: 3,
					orderable: false,
			},{
					targets: 4,
					orderable: false,
			},{
					targets: -1,
					title: 'Manage Reports',
					orderable: false,
					render: function(data, type, full  , meta) {
              manage_reports = `<a href="${website_url}/?view=ManageReports&exam_id=${exam_id}&question_id=${full._id}" target="_blank"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
              <i class="la la-warning"></i>
            </a>`;

						return  `
            ${manage_reports}
            `;
					},
				}
			],
		});
		return table;
	};

	return {

		//main function to initiate the module
		init: function() {
			return initTable1();
		},

	};

}();



var DatatablesDataSourceAjaxServer2 = function() {

	var initTable2 = function() {
		var table = $('#m_table_2');

		// begin first table
		table.DataTable({

			responsive: true,
			searchDelay: 500,
      		processing: true,
			serverSide: true,

       ajax:{url:website_url+"/UsersExamined?_id="+exam_id, function (data, callback, settings) {
       }
       },
			columns: [
                {data: 'full_name' ,title: "Name"},
                {data: 'email' ,title: "Email"},
                {data: 'count' ,title: "Proceeded times"},
                {data: 'submitedTries' ,title: "Submited Tries"},
				{data: 'Actions',title: "Manage Marks"},
			],
			columnDefs: [{
					targets: -1,
					title: 'Marks',
					orderable: false,
					render: function(data, type, full  , meta) {
						return `<a class="btn btn-danger" href="${website_url}/?view=UserMarks&user_id=${full._id}&exam_id=${exam_id}&user_name=${full.full_name}" target="_blank" >Marks</button>`
					},
				}
			],
		});
		return table;
	};

	return {

		//main function to initiate the module
		init: function() {
			return initTable2();
		},

	};

}();



var table_reload;
jQuery(document).ready(function() {
	table_reload=DatatablesDataSourceAjaxServer.init();
	table_reload2=DatatablesDataSourceAjaxServer2.init();

	get_general_stats(exam_id);
                 validation( {});
                  

});


var custom_after=  function(data){
  alert("welcome to edit")
      $("#tags").val(data.mytags);
     

}

//charts
function get_general_stats(exam_id) {
    $.ajax({
        url: website_url+"/charts?_id="+exam_id,
        beforeSubmit: function () {
            mApp.block(".m-invoice__wrapper");
        }, complete: function (jqXHR, textStatus) {
            var data = $.parseJSON(jqXHR.responseText);

		    google.charts.load('current', {'packages': ['corechart', 'bar']});
		    google.charts.setOnLoadCallback(function () {
		    	//charts data 
		        var data1 = google.visualization.arrayToDataTable([
		        	//chart header idk what is this hhh
		            ['Task', 'Questions stats'],
		            //chart data
		            ['True', data.trueTrials],
		            ['False', data.falseTrials]
		        ]);

		        var data2 = google.visualization.arrayToDataTable([
		            ['Task', 'Tris Exam'],
		            ["number of participants", data.Participants],
		            ['number of tries', data.noOfTrials],
		        ]);
		        var data3 = google.visualization.arrayToDataTable([
		            ['Task', 'Tris Exam'],
		           	['active questions', data.noOfActiveQuestions],
		            ['Suspended questions', data.noOfSuspendedQuestions]
		        ]);

		        /////////
		        data4Arr=[["Question","true","false"]];
		        Question = 1
		        $.each( data.questionsRatio.true, function( key, value ) {
		        	if(value!="suspended"){
		        		data4Arr.push(["Q"+Question,value,data.questionsRatio.false[key]]);
		        	}else{
		        		data4Arr.push(["Q"+Question+"(Suspended)",0,0]);
		        	}
		        	Question++;
				});
				 var data4 = google.visualization.arrayToDataTable(data4Arr);
				//////////
				///
				var data5 = google.visualization.arrayToDataTable([
		            ['Task', 'Mark Distribution'],
		           	['0-20%', data.MarksDistribution["<0.2"]],
		            ['20-40%', data.MarksDistribution["<0.4"]],
		            ['40-60%', data.MarksDistribution["<0.6"]],
		            ['60-80%', data.MarksDistribution["<0.8"]],
		            ['80-100%', data.MarksDistribution["<1"]]
		        ]);
				///
		        //charts options
		        var options1 = {
		            title: 'Questions stats'
		        };

		        var options2 = {
		            title: 'Exams Stats',
		            //value instead precentage
					pieSliceText:"value"

		        };
		        var options3 = {
		            title: 'Questions status',
		            pieSliceText:"value"
		        };
		        var options4 = {
        			height: 400,

			        chart: {
			          title: 'solved questions detailed States',
			          subtitle: 'The number of true and false solution per each question'
			        },
			        hAxis: {
			          title: 'number of true/false solutions',
			          minValue: 0,
			        },
			        vAxis: {
			          title: 'Question'
			        },
			        bars: 'horizontal',
			        axes: {
			          y: {
			            0: {side: 'right'}
			          }
			        }
			      };
			      var options5 = {
		            title: 'Marks Distribution',
		            pieSliceText:"value",
					height: 400,

		        };
		        //specify the type of the chart and the div to draw on 
		        var chart  = new google.visualization.PieChart(document.getElementById('piechart'));
		        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
		        var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
		        var chart4 = new google.charts.Bar(document.getElementById('chart_div'));
		        var chart5 = new google.visualization.BarChart(document.getElementById('chart_div2'));

		        //draw charts
		        chart.draw(data1, options1);
		        chart2.draw(data2, options2);
		        chart3.draw(data3, options3);
		        chart4.draw(data4, google.charts.Bar.convertOptions(options4));
		        chart5.draw(data5, options5);


		    });
		}
	})
}
