import common from "./common";
class GoogleForm{
    constructor() {
        this.modules = [];
    }

    onLoadPage(){
        common.removeErrorOnInput('#google_form');
        this.submitForm();
    }

    submitForm() {
        $("#google_form").on('submit', function (e) {
            e.preventDefault();
            let formdata = new FormData($(this)[0]);
            let url = "/googleform/store";

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                processData: false,
                contentType: false,
                type: "POST",
                url: window.location.origin + url,
                data: formdata,
                beforeSend: function () {
                    console.log('loading...');
                },
                success: function (response) {
                    var errors = response.errors;

                    $.each(errors, function (index, value) {
                        common.showError(index, value)
                    })

                    if((!errors)){
                        common.showToast('Form submitted successfully!');

                        setTimeout(() => {    
                            window.location.reload();
                        }, 1000);
                    }

                },
                error: function (err) {
                    console.log("Error:", err);
                }
            });
        });
    }
}

export default new GoogleForm();