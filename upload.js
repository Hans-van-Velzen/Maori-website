const processurl = 'process.php';
const uploadurl = 'php/upload.php';
const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  const filesinputs = document.querySelectorAll('[type=file]');
//  console.log(files);
  const formData = new FormData();
  // const JSONdata = new FormData();
  const data = new FormData(e.target);
  const value = Object.fromEntries(data.entries());
//console.log(value); // This now holds a JSON object with ALL form fields and their values.

for (let j = 0; j < filesinputs.length; j++ ) {
  let files = filesinputs[j].files;
  for (let i = 0; i < files.length; i++) {
    let file = files[i]

    formData.append('files[]', file);
  }
}

formData.append('jsonfile', 'test.json');
formData.append('JSON', value);
// JSONdata.append('jsonfile', 'json/test.json');
// JSONdata.append('JSON', value);

  fetch(processurl, {
    method: 'POST',
    body: formData,
//    body: formData,
  }).then((response) => {
    console.log(response)
  })
})
