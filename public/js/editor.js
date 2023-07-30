// Initialize Firebase
firebase.initializeApp(firebaseConfig);

function uploadFile(inputFile, type, value, Btn) {
    const ref = firebase.storage().ref();
    const file = inputFile.files[0];
    const name = type + +new Date();
    const metadata = { contentType: file.type };

    const upload = ref.child(name).put(file, metadata);
    upload
          .then((snapshot) => snapshot.ref.getDownloadURL())
          .then((url) => {
                console.log(url);
                $(value).val(url);
                $(Btn).prop('disabled', false);
                $(Btn).removeClass('disable-btn');
                $(".lds-dual-ring").hide();
                $(".btn-text").show();
          });

}

function removeFile(urlFile) {
    const fileRef = firebase.storage().refFromURL(urlFile);

    fileRef.delete()
          .then(function () {
                console.log("File Deleted");
          }).catch(function (error) {
                console.log(error);
          });
}

function inputFile(id) {
    let fileLength = document.getElementById(id).files.length;
    let file = document.getElementById(id);
    let oldFile = $(`#old_${id}`).val();
    let urlFile = `#url_${id}`;
    let type = id.toUpperCase();
    console.log(urlFile)
    $(".lds-dual-ring").show();
    $(".btn-text").hide();

    if (id == "about_img") {
        var Btn = "#aboutImageBtn";
    } else if (id == "work_img") {
        var Btn = "#modalBtn"
    } else {
        var Btn = "#fileBtn";
    }

    if (fileLength != 0) {
        // if (oldFile) {
        //     removeFile(oldFile);
        // }

        uploadFile(file, type, urlFile, Btn);
    }
    
}

$(document).ready(function() {
    $(".lds-dual-ring").hide();
});

$('#works-table').DataTable();
$('#skills-table').DataTable();