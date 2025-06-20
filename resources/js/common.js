class Common{


     // Create Table with AJAX
      createTableAjax(table, theads, url, tbodies=""){
        const self = this

        $(table).DataTable().clear().destroy();
        $(table).DataTable({
            autoWidth   : false,
            processing  : true,
            serverSide  : true,
            stateSave   : false,
            language: {
                "paginate": {
                    "next": '<span aria-hidden="true">&gt;</span>',
                    "previous": '<span aria-hidden="true">&lt;</span>'
                },
                "search": "",
                "searchPlaceholder": "Type any to search",
                "lengthMenu": "_MENU_"
            },
            ajax: {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": window.location.origin + url,
                "type": "POST",
                "data": function(d) {
                    d.search = $("input[type='search']").val();

                },
                beforeSend: function() {
                },
                complete: function(data) {
                },
                error: function(error) {
                }
            },
            columns     : theads,
            columnDefs  : tbodies,
            drawCallback: function () { self.initializeButtons(table, url) }
        }); 
    }
    
    // Initialize Button
    initializeButtons(table_name, url, useModal = true) {
        const self = this

        // Edit
        $(table_name).on('click', '.btn-view', function () {
            self.showModal('#datatableModal')
        });
    }


    showError(index, value) {
        var elem_id = '#' + index;
        $(elem_id).addClass('error-input');
        $('.error-' + index).removeClass('d-none');
        $('.error-' + index).html('<i class="bi bi-exclamation-circle-fill"></i> ' + value);
    }

    removeError(index) {
        var elem_id = '#' + index;
        $(elem_id).removeClass("error-input");
        $(".error-" + index).empty();
        $(".error-" + index).addClass('d-none');
    }

    // Remove Error on input
    removeErrorOnInput(formid){
         const common = this;
        $(formid).find(':input').on('input', function(e){
            var index = $(this).attr('name');
            if($(this).val() != '') common.removeError(index);
        });
    }

    showToast(msg, err=0){
        $('.toast-body strong').text(msg);
        $('.toast').css('z-index', 10000);
        $('.toast').fadeIn('slow');

        if( err > 0 ) $('.toast').addClass('error')
        else $('.toast').removeClass('error');
        
        setTimeout(() => {
            $('.toast').fadeOut('slow');
        }, 3000);
    } 
    
    /**
     * Show Modal
     * @param modal_id = modal id
     */
    showModal(modal_id) {

        var modalElement = document.querySelector(modal_id);
        var modalInstance = bootstrap.Modal.getInstance(modalElement);

        if (!modalInstance) {
            modalInstance = new bootstrap.Modal(modalElement);
        }

        modalInstance.show();
    }

    /**
     * Hide Modal
     * @param modal_id = modal id
     */
    hideModal(modal_id) {

        var modalElement = document.querySelector(modal_id);
        var modalInstance = bootstrap.Modal.getInstance(modalElement);

        if (!modalInstance) {
            modalInstance = new bootstrap.Modal(modalElement);
        }

        modalInstance.hide();
    }
}

export default new Common;