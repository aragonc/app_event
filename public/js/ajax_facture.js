CKEDITOR.replace( 'feature_content', { } );

function textCKEditor()
{
    var editorText = CKEDITOR.instances.feature_content.getData();
    return editorText;
}

$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();

    //display modal form for creating new product *********************
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmFeatures').trigger("reset");
        $('#modal_features').modal('show');
        $('#modal-title').html('Agregar característica');
        CKEDITOR.instances.feature_content.setData('');
    });

    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var product_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: url + '/' + product_id,
            success: function (data) {
                console.log(data);
                $('#feature_id').val(data.id);
                $('#feature_title').val(data.feature_title);
                $('#feature_icon').val(data.feature_icon);
                CKEDITOR.instances.feature_content.setData(data.feature_content);
                $('#event_id').val(data.event_id);
                $('#btn-save').val("update");
                $('#modal_features').modal('show');
                $('#modal-title').html('Actualizar característica');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new feacture / update existing feacture ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var contentEditor = textCKEditor();

        e.preventDefault();
        var formData = {
            feature_title: $('#feature_title').val(),
            feature_icon: $('#feature_icon').val(),
            feature_content: contentEditor,
            feature_extra: '',
            feature_visible:1,
            event_id: $('#event_id').val(),
            id: $('#feature_id').val()
        };

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var feature_id = $('#feature_id').val();
        var my_url = url + "/store";
        if (state === "update"){
            type = "PUT"; //for updating existing resource
            my_url = url + '/' + feature_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var feature = '<tr id="feature_' + data.id + '"><td>' + data.id + '</td><td>' + data.feature_title + '</td><td>'+data.feature_icon+'</td><td>'+data.updated_at+'</td>';
                feature += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '"><i class="fas fa-pen"></i></button>';
                feature += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '"><i class="fas fa-trash"></i></button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#feature-list').append(feature);
                }else{ //if user updated an existing record
                    $("#feature_" + feature_id).replaceWith( feature );
                }
                $('#frmFeatures').trigger("reset");
                $('#modal_features').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click','.delete-product',function(){
        var feature_id = $(this).val();

        var alertModal = confirm("¿Realmente deseas eliminar, esta característica?");

        if(alertModal){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                type: "DELETE",
                url: url + '/' + feature_id,
                success: function (data) {
                    console.log(data);
                    $("#feature_" + feature_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }

    });

});