import common from "./common";
class GoogleForm{
    constructor() {
        this.modules = [];
    }

    onLoadPage(){
        common.removeErrorOnInput('#google_form');
        this.submitForm();
        this.loginForm();
        this.onClickButton();
    }

    submitForm() {
        $("#google_form").on('submit', function (e) {
            $("#submit-btn").attr('disabled', true)
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
                        $("#submit-btn").attr('disabled', false)
                    if((!errors)){
                        common.showToast('Form submitted successfully!');
                        

                        setTimeout(() => {    
                            window.location.reload();
                            $("#submit-btn").attr('disabled', false)
                        }, 1000);
                    }

                },
                error: function (err) {
                    console.log("Error:", err);
                }
            });
        });
    }

    loginForm(){
        $("#login_form").on('submit', function (e) {
            e.preventDefault();
            let formdata = new FormData($(this)[0]);
            let url = "/googleform/login";

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
                    let result = response.result;
                 
                    if (result == 200) {    
                        $('.questionnaire-container').removeClass('d-none')
                        $('.em-code-container').addClass('d-none')
                        $('#emp_code_form').val(response.emp_code);
                        const savedAnswers = response.answers || {};

                        Object.entries(savedAnswers).forEach(([questionName, answerValue]) => {
                        $(`input[name="${questionName}"][value="${answerValue}"]`).prop('checked', true);
                        $('.submit-container').removeClass('d-none');
                        if(response.is_submit == 1){
                            $('.submit-container').removeClass('d-none');
                            $('.questionnaire-container').addClass('d-none')
                        }
                    });
                    } else {
                        common.showToast('Invalid credentials, please try again.', 1);
                    }
                        
                },
                error: function (err) {
                    console.log("Error:", err);
                }
            });
        });
    }

    onClickButton(){
        let lastChecked = {};
        $('input[type="radio"]').on('click', function () {
            let name = $(this).attr('name');     // e.g., question-3
            let value = $(this).val();           // e.g., A or B
            let empCode = $('#emp_code_form').val();  // get emp_code from hidden field
            console.log("Name:", name, "Value:", value, "Emp Code:", empCode);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: "POST",
                url: '/googleform/autosave',
                data: {
                    emp_code: empCode,
                    name: name,
                    value: value
                },
                success: function (response) {
                    if (response.success) {
                        console.log("Answers updated:", response.answers);
                    } else {
                        alert('Failed to save.');
                    }
                },
                error: function (err) {
                    console.error("Error:", err);
                }
            });
        });
    }
    
}

export default new GoogleForm();