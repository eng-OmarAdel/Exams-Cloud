/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var ZiPortletManager = function () {
    var createPortletManager = function () {
        return {
            array: [],
            active: "",
            manage: function (element) {
                if ($.inArray(element, this.array) < 0) {
                    element.hide();
                    this.array.push(element);
                }
            },
            hide: function () {
                if (this.active) {
                    this.active.hide();
                    this.active = null;
                }
                this.array.forEach(function (item, index) {
                    item.hide();
                });
            },
            show: function (element) {
                this.hide();
                element.show();
                this.active = element;
            }
        };
    };
    var managers = [];
    var o = function () {
        $(".portlet-managed").each(function () {
            var groups = $(this).data("portletgroup");
            if (!groups) {
                groups = '';
            }
            var groupx = groups.split(',');
            var groupz = [];
            if (Object.prototype.toString.call(groupx) === '[object Array]') {
                groupz = groupx;
            } else {
                groupz[0] = groupx;
            }
            groupz.forEach(function (item, index) {
                var group = item;
                var manager;
                if (group === '' || group === ' ') {
                    group = 'default';
                }
                manager = managers[group];
                if (!manager) {
                    managers[group] = createPortletManager();
                    manager = managers[group];
                }
                manager.manage($(this));
            });
        });
        
        $(".portlet-opener2").each(function () {
            $(this).off("click");
            $(this).click(function () {
                  $(".ssss").css("display", "none");
                var portlet = $($(this).data("portlet"));
                var groups = portlet.data("portletgroup");
                if (!groups || groups === '' || groups === ' ') {
                    groups = 'default';
                }
                var groupx = groups.split(',');
                var groupz = [];
                if (Object.prototype.toString.call(groupx) === '[object Array]') {
                    groupz = groupx;
                } else {
                    groupz[0] = groupx;
                }
                groupz.forEach(function (item, index) {
                    var group = item;
                    var manager = managers[group];
                    if (manager) {
                        manager.show(portlet);
                    }
                });
                var callback = $(this).data("portletcallback");
                if (callback) {
                    eval(callback);
                }
            });
        }); $(".portlet-opener").each(function () {
            $(this).off("click");
            $(this).click(function () {
                var portlet = $($(this).data("portlet"));
                var groups = portlet.data("portletgroup");
                if (!groups || groups === '' || groups === ' ') {
                    groups = 'default';
                }
                var groupx = groups.split(',');
                var groupz = [];
                if (Object.prototype.toString.call(groupx) === '[object Array]') {
                    groupz = groupx;
                } else {
                    groupz[0] = groupx;
                }
                groupz.forEach(function (item, index) {
                    var group = item;
                    var manager = managers[group];
                    if (manager) {
                        manager.show(portlet);
                    }
                });
                var callback = $(this).data("portletcallback");
                if (callback) {
                    eval(callback);
                }
            });
        });
        $(".remove-portlet").off("click");
        $(".remove-portlet").click(function () {
            var groups = $(this).data("portletgroup");
            if (!groups || groups === '' || groups === ' ') {
                groups = 'default';
            }
            var groupx = groups.split(',');
            var groupz = [];
            if (Object.prototype.toString.call(groupx) === '[object Array]') {
                groupz = groupx;
            } else {
                groupz[0] = groupx;
            }
            groupz.forEach(function (item, index) {
                var manager = managers[item];
                manager.hide();
            });
        });
    };
    return{init: function () {
            o();
        }};
}();


