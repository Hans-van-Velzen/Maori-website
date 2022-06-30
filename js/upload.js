const processurl = 'php/process.php';
const uploadurl = 'php/upload.php';
const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  const filesinputs = document.querySelectorAll('[type=file]');
//  console.log(files);
  const formData = new FormData();
  const data = new FormData(e.target);
  const value = Object.fromEntries(data.entries());
// console.log(value); // This now holds a JSON object with ALL form fields and their values.

for (let j = 0; j < filesinputs.length; j++ ) {
  let files = filesinputs[j].files;
  for (let i = 0; i < files.length; i++) {
    let file = files[i]

    formData.append('files[]', file);
  }
}
  var jsonobject = 'json_string=' + (JSON.stringify(value));
  console.log(jsonobject);

  // the name of the json file will be the name of the applicant + the time.
  var jsonname = document.getElementById('ApplicantName').value + '-' + Date.now() ;
  formData.append('jsonfile', jsonname);
  formData.append('JSON', jsonobject);

  fetch(processurl, { 
    method: 'POST',
    body: formData,
  }).then((response) => {
    console.log(response)
  })
})
