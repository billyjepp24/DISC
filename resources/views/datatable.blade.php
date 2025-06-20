@extends('layout')
@section('content')
<!-- Bootstrap Bundle with Popper -->


<div class="data-table-container">
    <table id="answer_table">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
</div>



<div class="modal fade modal-wrapper" id="datatableModal"
    tabindex="-1" aria-labelledby="datatableModal" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Employee Table</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Custom header row -->
                <div class="d-flex justify-content-between align-items-start px-3 mb-3">
                    <!-- Left column -->
                    <div>
                        <div><strong>Name:</strong> <span id="modalName"></span></div>
                        <div><strong>Employee Code:</strong> <span id="modalCode"></span></div>
                    </div>
                    <!-- Right column -->
                    <div class="text-end">
                        <div><strong>Department/Campaign:</strong> <span id="modalDept"></span></div>
                        <div><strong>Date:</strong> <span id="modalDate"></span></div>
                    </div>
                </div>

                <div class="score-title text-center mb-3">SCORE SHEET</div>

                <!-- Custom table -->
                <table class="table table-bordered">
                    <tbody>
                        <tr><td>1</td><td>B</td><td>D</td><td>A</td><td>C</td></tr>
                        <tr><td>2</td><td>A</td><td>C</td><td>D</td><td>B</td></tr>
                        <tr><td>3</td><td>C</td><td>B</td><td>A</td><td>D</td></tr>
                        <tr><td>4</td><td>A</td><td>D</td><td>C</td><td>B</td></tr>
                        <tr><td>5</td><td>D</td><td>B</td><td>C</td><td>A</td></tr>
                        <tr><td>6</td><td>B</td><td>A</td><td>D</td><td>C</td></tr>
                        <tr><td>7</td><td>C</td><td>D</td><td>B</td><td>A</td></tr>
                        <tr><td>8</td><td>B</td><td>A</td><td>D</td><td>C</td></tr>
                        <tr><td>9</td><td>D</td><td>A</td><td>C</td><td>B</td></tr>
                        <tr><td>10</td><td>C</td><td>B</td><td>D</td><td>A</td></tr>
                        <tr><td>11</td><td>A</td><td>D</td><td>C</td><td>B</td></tr>
                        <tr><td>12</td><td>D</td><td>C</td><td>A</td><td>B</td></tr>
                        <tr><td>13</td><td>B</td><td>A</td><td>D</td><td>C</td></tr>
                        <tr><td>14</td><td>C</td><td>D</td><td>B</td><td>A</td></tr>
                        <tr><td>15</td><td>D</td><td>A</td><td>C</td><td>B</td></tr>
                        <tr><td>16</td><td>A</td><td>B</td><td>C</td><td>D</td></tr>
                        <tr><td>17</td><td>B</td><td>C</td><td>D</td><td>A</td></tr>
                        <tr><td>18</td><td>C</td><td>A</td><td>B</td><td>D</td></tr>
                        <tr><td>19</td><td>D</td><td>B</td><td>C</td><td>A</td></tr>
                        <tr><td>20</td><td>A</td><td>D</td><td>C</td><td>B</td></tr>
                        <tr><td>21</td><td>A</td><td>B</td><td>C</td><td>D</td></tr>
                        <tr><td>22</td><td>D</td><td>C</td><td>B</td><td>A</td></tr>
                        <tr><td>23</td><td>D</td><td>B</td><td>A</td><td>C</td></tr>
                        <tr><td>24</td><td>D</td><td>C</td><td>A</td><td>B</td></tr>
                        
                        <tr class="disc-row">
                            <th class="no-border">Total</th>
                            <th id="totalD"></th>
                            <th id="totalI"></th>
                            <th id="totalS"></th>
                            <th id="totalC"></th>
                        </tr>

                        <tr class="disc-row">
                        <th class="no-border"></th>
                        <th>D</th>
                        <th>I</th>
                        <th>S</th>
                        <th>C</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
@vite(['resources/js/list_datatable.js'])
<script type="module">
ListDataTable.onLoadPage();
</script>
@endsection