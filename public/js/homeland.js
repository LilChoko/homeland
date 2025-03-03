$(document).ready(function(){
    $("#btnSendContactAgentMessage").click((event) =>{
        event.preventDefault();
        // alert("Sending Information");
        const formData = {
            "name":$("#name").val(),
            "email":$("#email").val(),
            "phone":$("#phone").val(),
            "message":$("#message").val(),
            "property_id":$("#property_id").val()
        }
        $.ajax({
            url:"/api/contact_agent",
            type: "post",
            data: formData,
            success: (response)=>{
                $("#formContactAgent").trigger("reset");
                $("#successAlert").removeClass("d-none");
                setTimeout(()=>{
                    $("#successAlert").addClass("d-none");
                }, 5000)
                // alert("Contact Agent Message Sent Successfully");
            },
            error: (errors)=>{
                console.error(errors);
            }
        })
    });

    let table = new DataTable('#tblProperties1');

    new DataTable('#tblProperties2', {
        ajax: '/api/properties/datatables',
        columns: [
            { data: 'address' },
            { data: 'price' },
            {data: 'list_type.name'},
            {data: 'offer_type'},
            {data: 'city.name'}
        ]
    });
});
