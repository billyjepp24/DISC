import common from "./common";
class GoogleFormApp {
    constructor() {
        this.modules = [];
    }

    onLoadPage() {
        
        common.removeErrorOnInput('#applicant_login');
        this.submitForm();
        this.loginForm();
        this.onClickButton();
    }

    submitForm() {
        $("#googleapp_form").on('submit', function (e) {
            e.preventDefault();
            $("#submit-btn").attr('disabled', true);

           
            let allAnswered = true;
            let firstUnanswered = null;
            const questionNames = [];

            $('input[type="radio"]').each(function () {
                const name = $(this).attr('name');
                if (!questionNames.includes(name)) {
                    questionNames.push(name);
                }
            });

            questionNames.forEach(name => {
                if ($(`input[name="${name}"]:checked`).length === 0) {
                    allAnswered = false;
                    firstUnanswered = name;
                    $(`.error-${name}`).text('Please select an option.').removeClass('d-none');
                } else {
                    $(`.error-${name}`).text('').addClass('d-none');
                }
            });

            if (!allAnswered) {
                common.showToast('Please answer all questions before submitting.', 1);
                $('html, body').animate({ scrollTop: $(`.error-${firstUnanswered}`).offset().top - 100 }, 500);
                $("#submit-btn").attr('disabled', false);
                return;
            }

            $('#hidden_email').val($('#email').val());
            $('#hidden_name').val($('#name').val());
            let formdata = new FormData($(this)[0]);
            let url = "/googleform-app/store";

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                processData: false,
                contentType: false,
                type: "POST",
                url: window.location.origin + url,
                data: formdata,
                beforeSend: function () {
                    console.log('Submitting...');
                },
                success: function (response) {
                    if (response.success) {
                        common.showToast('Form submitted successfully!');
                        $('.questionnaire-container').addClass('d-none');
                        $('.submit-container').removeClass('d-none');
                         $("#submit-btn").addClass('d-none');
                    } else if (response.errors) {
                        Object.entries(response.errors).forEach(([field, messages]) => {
                            common.showError(field, messages);
                        });
                        $("#submit-btn").attr('disabled', false);
                    } 
                },
                error: function (err) {
                    console.error("Submission Error:", err);
                    $("#submit-btn").attr('disabled', false);
                }
            });
        });
    }

    loginForm() {
        $("#applicant_login").on('submit', function (e) {
            e.preventDefault();
            let formdata = new FormData($(this)[0]);
            let url = "/googleform-app/store-basic";

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                processData: false,
                contentType: false,
                type: "POST",
                url: window.location.origin + url,
                data: formdata,
                beforeSend: function () {
                    console.log('Logging in...');
                },
                success: function (response) {
                    if (response.success) {
                        $('.questionnaire-container').removeClass('d-none');
                        $('.em-code-container').addClass('d-none');
                        $('#applicant_form_email').val($('#email').val());
                        $('#applicant_form_name').val($('#name').val());

                        const savedAnswers = response.answers || {};
                        Object.entries(savedAnswers).forEach(([questionName, answerValue]) => {
                            $(`input[name="${questionName}"][value="${answerValue}"]`).prop('checked', true);
                        });

                        if (response.is_submit == 1) {
                            $('.submit-container').removeClass('d-none');
                            $('.questionnaire-container').addClass('d-none');
                        }
                    } else {
                        common.showToast('Login failed, please try again.', 1);
                    }
                },
                error: function (err) {
                    console.error("Login Error:", err);
                }
            });
        });
    }

    onClickButton() {
        $('input[type="radio"]').on('click', function () {
            const name = $(this).attr('name');
            const value = $(this).val();
            const email = $('#email').val();

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: "POST",
                url: window.location.origin + "/googleform-app/autosave",
                data: { email, name, value },
                success: function (response) {
                    if (response.success) {
                        console.log("Auto-saved successfully.");
                    } else {
                        console.log("Auto-save failed.");
                    }
                },
                error: function (err) {
                    console.error("Auto-save Error:", err);
                }
            });
        });
    }
}

export default new GoogleFormApp();
