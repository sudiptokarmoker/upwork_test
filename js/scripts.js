$(function () {
    $(".txtTaskDate").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"
    });
    /**
     * Form post handle
     */
    // process the form
    $('form').submit(function (event) {
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        let formData = {
            task_name: $('input[name=txtTaskName]').val(),
            task_date: $('input[name=txtTaskDate]').val(),
            task_description: $('input[name=txtTaskDescription]').val()
        };
        // console.log(formData);
        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: base_url + 'tasks/insert', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
            // using the done promise callback
            .done(function (data) {
                // log data to the console so we can see
                console.log(data);
                // here we will handle errors and validation messages
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none');
                    if (data.status === true) {
                        $('.task-grid-lists').html(data.content);
                    }
                    $('form')[0].reset();
                } else {
                    $(".print-error-msg").css('display', 'block');
                    $(".print-error-msg").html(data.error);
                }
            });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    /**
     * end of form post
     */
});

function delete_task(deleted_id) {
    $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: base_url + 'tasks/delete/',
        data: {
            id: deleted_id
        }, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true
    })
        // using the done promise callback
        .done(function (data) {
            // log data to the console so we can see
            // here we will handle errors and validation messages
            if (data.status === true) {
                $('.task-grid-lists').html(data.content);
            }
        });
}