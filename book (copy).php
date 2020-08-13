<script>
$(document).ready(function() {


    var table = $('#task_list').DataTable();


    var weekpicker, start_date, end_date;

    function set_week_picker(date) {
        start_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
        end_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);

        weekpicker.datepicker('update', start_date);
        weekpicker.val(start_date.getDate() + '/' + (start_date.getMonth() + 1) + '/' + start_date.getFullYear() + ' - ' + end_date.getDate() + '/' + (end_date.getMonth() + 1) + '/' + end_date.getFullYear());

        start_date2 = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear();
        end_date2 = (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear();

    }

    weekpicker = $('.week-picker');
    console.log(weekpicker);
    weekpicker.datepicker({
        autoclose: true,
        forceParse: false,
        container: '#week-picker-wrapper',
    }).on("changeDate", function(e) {
        set_week_picker(e.date);

    });
    $('.week-prev').on('click', function() {
        var prev = new Date(start_date.getTime());
        prev.setDate(prev.getDate() - 1);
        set_week_picker(prev);
        table.draw();
    });

    $('.week-next').on('click', function() {
        var next = new Date(end_date.getTime());
        next.setDate(next.getDate() + 1);
        set_week_picker(next);
        table.draw();
    });
    set_week_picker(new Date);

    //start_date2 = "";
    //end_date2 = "";


    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {

            var min = new Date(start_date2).getTime();
            var max = new Date(end_date2).getTime();


            data[1] = data[1].split(/\//).reverse().join('/');

            if (typeof data._date == 'undefined') {

                data._date = new Date(data[1]).getTime();

            }
            //console.log(min+'-'+max+'-'+date_value);
            //console.log(start_date2 + '-' + end_date2 + '-' + data[1]);
            //console.log(min + '-' + max);
            if (min && !isNaN(min)) {
                if (data._date < min) {
                    return false;
                }
            }

            if (max && !isNaN(max)) {
                if (data._date > max) {
                    return false;
                }
            }
            return true;

        }
    );

});</script>
<div class="content-left">
    <div class="header-toolbar-list">


        <div class="form-group col-sm-4 col-md-offset-2" id="week-picker-wrapper">
            <label for="week" class="control-label">Select Week</label>
            <div class="input-group">
                <span class="input-group-btn">
          <button type="button" class="btn btn-rm week-prev">«</button>
        </span>
                <input class="form-control week-picker" placeholder="Select a Week" type="text">
                <span class="input-group-btn">
          <button type="button" class="btn btn-rm week-next">»</button>
        </span>
            </div>
        </div>

        <div class="taskfilterselector">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">View <span class="caret"></span></a>
            <ul class="dropdown-menu pull-right">
                <li class="selected"><a href="#">Weekly</a></li>
                <li><a href="#">Monthly</a></li>
            </ul>
        </div>
    </div>

    <div class="task_wrapper">
        <div class="table-responsive">
            <div id="task_list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="task_list_length">
                            <label>Show
                                <select name="task_list_length" aria-controls="task_list" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="task_list_filter" class="dataTables_filter">
                            <label>Search:
                                <input class="form-control input-sm" placeholder="" aria-controls="task_list" type="search">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="task_list" class="table table-hover table-striped table-bordered dataTable" role="grid" aria-describedby="task_list_info" style="width: 100%;" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="task_list" rowspan="1" colspan="1" style="width: 49px;" aria-sort="ascending" aria-label="Today 5: activate to sort column descending">Today
                                        <div class="task_count">5</div>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="task_list" rowspan="1" colspan="1" style="width: 103px;" aria-label=": activate to sort column ascending"></th>
                                    <th class="sorting" tabindex="0" aria-controls="task_list" rowspan="1" colspan="1" style="width: 980px;" aria-label=": activate to sort column ascending"></th>
                                    <th class="sorting" tabindex="0" aria-controls="task_list" rowspan="1" colspan="1" style="width: 13px;" aria-label=": activate to sort column ascending"></th>
                                    <th class="sorting" tabindex="0" aria-controls="task_list" rowspan="1" colspan="1" style="width: 21px;" aria-label=": activate to sort column ascending"></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </tfoot>
                            <tbody>








                                <tr role="row" class="odd">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">14/09/2017</td>
                                    <td><span class="taskcategory">Meeting</span><a class="task-name" href="javascript:void(0);">nay</a> <a href="http://secure.seowebcreative.com/edit-task/?id=118"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="118"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">11/09/2017</td>
                                    <td><span class="taskcategory">Phone</span><a class="task-name" href="javascript:void(0);">goku</a> <a href="http://secure.seowebcreative.com/edit-task/?id=117"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="117"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">16/09/2017</td>
                                    <td><span class="taskcategory">Phone</span><a class="task-name" href="javascript:void(0);">test6</a> <a href="http://secure.seowebcreative.com/edit-task/?id=116"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="116"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">05/09/2017</td>
                                    <td><span class="taskcategory">Meeting</span><a class="task-name" href="javascript:void(0);">test5</a> <a href="http://secure.seowebcreative.com/edit-task/?id=115"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="115"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">07/09/2017</td>
                                    <td><span class="taskcategory">Phone</span><a class="task-name" href="javascript:void(0);">test4</a> <a href="http://secure.seowebcreative.com/edit-task/?id=114"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="114"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">01/09/2017</td>
                                    <td><span class="taskcategory">Phone</span><a class="task-name" href="javascript:void(0);">test3</a> <a href="http://secure.seowebcreative.com/edit-task/?id=113"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="113"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">09/09/2017</td>
                                    <td><span class="taskcategory">Phone</span><a class="task-name" href="javascript:void(0);">testu</a> <a href="http://secure.seowebcreative.com/edit-task/?id=112"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="112"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1" width="30">
                                        <input id="check" type="checkbox">
                                    </td>
                                    <td width="120">02/09/2017</td>
                                    <td><span class="taskcategory">Phone</span><a class="task-name" href="javascript:void(0);">test1</a> <a href="http://secure.seowebcreative.com/edit-task/?id=111"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="javascript:void(0);"
                                        class="delete_post" data-post-id="111"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    <td width="30"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                    <td width="30"><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="task_list_info" role="status" aria-live="polite">Showing 1 to 8 of 8 entries</div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="task_list_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" id="task_list_previous"><a href="#" aria-controls="task_list" data-dt-idx="0" tabindex="0">Previous</a></li>
                                <li class="paginate_button active"><a href="#" aria-controls="task_list" data-dt-idx="1" tabindex="0">1</a></li>
                                <li class="paginate_button next disabled" id="task_list_next"><a href="#" aria-controls="task_list" data-dt-idx="2" tabindex="0">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

