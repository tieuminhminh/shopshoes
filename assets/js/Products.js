function submitProduct(){

    let data = new FormData();
    data.append("name",$('#name').val());
    data.append("price",$('#price').val());
    data.append("color",$('#color').val());
    data.append("category",$('#category').val());
    data.append("image",$('#image').prop('files')[0]);

    $.ajax({
        url: "<?=BASE_URL?>/createController",
        type: "POST",
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        data: data,
        success: function(result) {
            if(result != null && result != ''){
                $('#error').text(JSON.parse(result));
                return;
            }
            alert("success!");
            $('#name').val('');
            $('#price').val('');
        }
    });

}

