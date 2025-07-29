@extends('layout')
@section('content')
<!-- Bootstrap Bundle with Popper -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="data-table-container">
    <table id="answers_table">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
</div>

 <a href="{{ url('/home') }}" class="btn btn-primary" style="width:200px; margin-left:340px; background: #6bb5d2;">Go to Dashboard</a> 

<div class="modal fade modal-wrapper" id="datatableModal"
    tabindex="-1" aria-labelledby="datatableModal" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Applicant Table</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Custom header row -->
                <div class="d-flex justify-content-between align-items-start px-3 mb-3">
                    <!-- Left column -->
                    <div>
                        <div><strong>Name:</strong> <span id="modalName"></span></div>
                        <div><strong>Email:</strong> <span id="modalEmail"></span></div>
                    </div>
                    <!-- Right column -->
                    <div class="text-end">
                        <!-- <div><strong>Department/Campaign:</strong> <span id="modalDept"></span></div> -->
                        <div><strong>Date:</strong> <span id="modalDate"></span></div>
                    </div>
                </div>

                <div class="score-title text-center mb-3">SCORE SHEET</div>

                <!-- Custom table -->
                {!! scoreBlock() !!}
            </div>
            
        </div>
        
    </div>
</div>
@endsection

@section('footer-scripts')

<script type="module">
ListDataTableApp.onLoadPage();
</script>
@endsection