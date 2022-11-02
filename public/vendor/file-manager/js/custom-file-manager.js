var selectedId = '';
var modal = $('#fileManagerModal');

modal.on('click', '.fm-grid-item', function (e) {
    let backButton = $(this).hasClass('unselectable');
    if (!backButton) fileClick(null);
});

$('.file-manager').click(function (e) {
    if (!selectedId) fileClick(null);
    selectedId = $(this);
});

function fileClick(t = null) {
    let name = t ? t.basename : '';
    let path = t ? t.dirname ? t.dirname + '/' + t.basename : t.basename : '';
    let img = t ? storage_base_link + 'storage/' + path : storage_base_link + 'backend/media/default.png';
    let link = t ? storage_base_link + 'storage/' + path : 'not selected';
    let size = t ? (t.size / 1024).toFixed(2) + ' KB' : '';
    let date = t ? timeConverter(t.timestamp) : '';

    let html = '<div class="row mb-5"><div class="col-12"><img class="w-100 border" src="' + img + '"></div></div>';
    if (t) {
        html = html +
            '<div class="row my-2"><div class="col-2 font-weight-bold">Name</div><div class="col-10">' +
            '<div class="input-group"><input type="text" id="nameInput" class="form-control" aria-describedby="basic-addon2" value="'+name+'" />' +
            '<div class="input-group-append getText" data-toggle="tooltip" title="Copy"> <span class="input-group-text"> <i class="far fa-clone" aria-hidden="true"></i> </span> ' +
            '</div> </div></div></div>\n' +
            '<div class="row my-2"><div class="col-2 font-weight-bold">Path</div><div class="col-10"><div class="input-group"> ' +
            '<input type="text" id="inputPath" class="form-control " aria-describedby="basic-addon2" value="'+path+'" /> <div class="input-group-append getText" data-toggle="tooltip" title="Copy"> ' +
            '<span class="input-group-text"> <i class="far fa-clone"></i> </span> </div> </div></div></div>\n' +
            '<div class="row my-2"><div class="col-2 font-weight-bold">Size</div><div class="col-10"><div class="input-group"> ' +
            '<input type="text" id="inputSize" class="form-control" aria-describedby="basic-addon2" value="'+size+'"/> ' +
            '<div class="input-group-append getText"> <span class="input-group-text"> <i class="far fa-clone"></i> </span> </div> </div></div></div>\n' +
            '<div class="row my-2"><div class="col-2 font-weight-bold">URL</div><div class="col-10"><div class="input-group"> ' +
            '<input id="link" type="text" class="form-control" aria-describedby="basic-addon2" value="' + link + '" /> ' +
            '<div class="input-group-append getText" data-toggle="tooltip" title="Copy"><span class="input-group-text"> ' +
            '<i class="far fa-clone" aria-hidden="true"></i> </span> </div> </div></div></div>' +
            '<div class="row my-2"><div class="col-2 font-weight-bold">Date</div><div class="col-10"><div class="input-group"> ' +
            '<input type="text" class="form-control" id="inputDate" aria-describedby="basic-addon2" value="'+date+'" /> <div class="input-group-append getText"> ' +
            '<span class="input-group-text"> <i class="far fa-clone"></i> </span> </div> </div></div></div>';
    } else {
        html = html + '<div class="row my-2">' +
            '<div class="col-12 font-weight-bold text-center">' +
            '<h5>Nothing is selected</h5>' +
            '</div>' +
            '</div>';
    }

    $('.modal-content').find('.fm-tree').html(html)
}

function selectImage(t = null) {

    let path = t ? t.dirname ? t.dirname + '/' + t.basename : t.basename : '';
    let image = t ? storage_base_link + 'storage/' + path : '';

    let parentDiv = selectedId.parents('#kt_uppy_2');
    parentDiv.addClass('d-none');
    let siblingDiv = parentDiv.siblings('#kt_image_5');
    siblingDiv.removeClass('d-none');
    siblingDiv.css('background-image',`url(${image})`);
    siblingDiv.find('input').val(path);

    $('#fileManagerModal').modal('hide')

}

function timeConverter(UNIX_timestamp) {
    let a = new Date(UNIX_timestamp * 1000);
    let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    let year = a.getFullYear();
    let month = months[a.getMonth()];
    let date = a.getDate();
    let hour = a.getHours();
    let min = a.getMinutes();
    return date + ' ' + month + ' ' + year + ' ' + hour + ':' + min;
}

modal.on('click', '.getText', function (e) {
    let id = $(this).siblings('input').attr('id');
    let copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
});

$('.removeImage').click(function(){
    var parentDiv = $(this).parents('#kt_image_5');
    parentDiv.addClass('d-none');
    parentDiv.siblings('#kt_uppy_2').removeClass('d-none');
    $(this).prev().val('');
});


