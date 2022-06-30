const url = 'php/upload.php';

function handleUploads(e) {
// document.querySelector('form').addEventListener('uploadFiles', (e) => {
  let formData = new FormData();
  formData.append("files[]", LandblockInfo.files[0]);
  formData.append("files[]", MeetingMinutes.files[0]);
  
  // e.preventDefault();
  // const files = document.querySelectorAll('[type=file]').files; // We have multiple file input fields, lets get all of them
  // for (let i = 0; i < files.length; i++) {
  //   let file = files[i];
  //   // TODO Check the file extension here, BEFORE uploading

  //   formData.append('files[]', file);
  // };

fetch('php/upload.php', {
    method: 'POST',
    body: formData,
  }).then((response) => {
    console.log(response)
  })
}

// form = document.querySelector('form')
Uplbutton = document.getElementByID('uploadFiles');

Uplbutton.addEventListener('click', (e) => handleUploads());