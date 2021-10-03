<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Import boostrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>        
        <!-- Import jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <!-- Import datatables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
        <!-- Import custom css -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
        <!-- Import Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <title>Laravel</title>
        <script>
            $(document).ready(function() {
                var categories_table = $('#CategoriesTable').DataTable( {
                    columns: [
                        null,
                        null,
                        { orderable: false }
                    ],
                    language: {
                        sSearch: "Filter ",
                        searchPlaceholder: "Type to filter"
                    }
                });

                var properties_table = $('#PropertiesTable').DataTable( {
                    rowReorder: {
                        selector: 'tr'
                    },
                    columnDefs: [
                        { targets: 0, visible: false }
                    ],
                    columns: [
                        null,
                        null,
                        null,
                        null,
                        { orderable: false }
                    ],
                    language: {
                        sSearch: "Filter ",
                        searchPlaceholder: "Type to filter"
                    }

                } );

                $('#addCategoryRow').on( 'click', function () {
                    var text_from_modal = $('#propertyNameTitle').val();
                    categories_table.row.add( [
                        text_from_modal,
                        "DD/MM/YY",
                        
                    ] ).draw( false );
                } );

                $('#addPropertyRow').on( 'click', function () {
                    var type_select = $('#typeSelect').val();
                    var start_text = $('#start').val();
                    var property_input_select = $('#propertyNameTitle').val();
                    var counter = 2;
                    properties_table.row.add( [
                        counter,
                        property_input_select,
                        type_select,
                        "DD/MM/YY"
                    ] ).draw( false );
                    counter ++;
                } );

                // Delete category
                $('#CategoriesTable').on('click', '.remove', function () {
                    var table = $('#CategoriesTable').DataTable();
                    table
                        .row($(this).parents('tr'))
                        .remove()
                    .draw();
                });

                // Delete property
                $('#PropertiesTable').on('click', '.remove', function () {
                    var table = $('#PropertiesTable').DataTable();
                    table
                        .row($(this).parents('tr'))
                        .remove()
                    .draw();
                });
            } );

            // Show aproppriate input element
            function showAppropriateInput(type_selection) {
                if (type_selection.value == "Date") {
                    document.getElementById("ifDate").style.display = "block";
                    document.getElementById("ifText").style.display = "none";
                    document.getElementById("ifNumber").style.display = "none";
                } else if (type_selection.value == "Text") {
                    document.getElementById("ifText").style.display = "block";
                    document.getElementById("ifDate").style.display = "none";
                    document.getElementById("ifNumber").style.display = "none";
                }else{
                    document.getElementById("ifNumber").style.display = "block";
                    document.getElementById("ifText").style.display = "none";
                    document.getElementById("ifDate").style.display = "none";
                }
            }
        </script>
    </head>

    <body>
        <div id = "allContent">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Categories</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dynamic properties</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!-- Create Category button  -->
                    <div id = "buttonDiv"> 
                        <button type="button" class="button button5" data-bs-toggle="modal" data-bs-target="#categoriesModal">
                            Create new Category
                        </button>
                    </div>
                    <!-- Categories Table -->
                    <table id="CategoriesTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Asset Category Name</th>
                                <th>Last modified</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>DD/MM/YY</td>
                                <td><button class="remove">
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>DD/MM/YY</td>
                                <td><button class="remove">
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div></button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!-- Create Property button  -->
                    <div id = "buttonDiv">
                        <button type="button" class="button button5" data-bs-toggle="modal" data-bs-target="#propertiesModal">
                            Create new Property
                        </button>
                    </div>
                    <!-- Properties Table -->
                    <table id="PropertiesTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Seq.</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Last modified</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td>Tiger Nixon</td>
                                <td>Text</td>
                                <td>DD/MM/YY</td>
                                <td><button class="remove">
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div></button>
                                </td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>Garrett Winters</td>
                                <td>Date</td>
                                <td>DD/MM/YY</td>
                                <td><button class="remove">
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div>
                                    <div id = "burgerDiv"></div></button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Categories Modal -->
            <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="categoriesModalLabel">Create Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="categoryNameTitle" placeholder="Please add a new category" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn cancelButton" data-bs-dismiss="modal">CANCEL</button>
                            <button type="button" id="addCategoryRow" class="button addButton" data-bs-dismiss="modal" aria-label="Close" >ADD</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Properties Modal -->
            <div class="modal fade" id="propertiesModal" tabindex="-1" aria-labelledby="propertiesModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="propertiesModalLabel">Create Dynamic Property</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <div class="control-group">
                                    <label class="control-label" for="propertyNameTitle">Dynamic Property Name</label>
                                    <div class="controls">
                                        <input type="text" id="propertyNameTitle" placeholder="Please add a new Property Title" />
                                    </div>
                                    <label class="control-label" for="typeSelect" id ="typeSelectLabel">Type</label>
                                    <select class="form-control" id="typeSelect" onchange="showAppropriateInput(this);">
                                        <option>Text</option>
                                        <option>Number</option>
                                        <option>Date</option>
                                    </select>
                                    <div id="ifDate" style="display: none;" >
                                        <input type="date" id="start" name="trip-start"
                                        value="2018-07-22"
                                        min="2018-01-01" max="2018-12-31" style="margin-top:50px;">
                                    </div>
                                    <div id="ifText">
                                        <div class="controls" style="margin-top:50px;">
                                            <input type="text" id="PropertyInput" placeholder="Please add text property" />
                                        </div>
                                    </div>
                                    <div id="ifNumber" style="display: none;">
                                        <div class="controls" style="margin-top:50px;">
                                            <input type="number" id="numberInput" placeholder="Please add number property" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn cancelButton" data-bs-dismiss="modal">CANCEL</button>
                            <button type="button" id="addPropertyRow" class="button addButton" data-bs-dismiss="modal" aria-label="Close" >ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
