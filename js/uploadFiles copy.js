function handleFormSubmit(event) {
    event.preventDefault(); 
  
    const data = new FormData(event.target);
    //develop tracing
    console.log(data.get('TTW_sections'));
    console.log(data.get('District'));
  
    const formJSON = Object.fromEntries(data.entries());
  
    // for multi-selects, we need special handling
    //formJSON.snacks = data.getAll('snacks');
  
    const results = document.querySelector('.results pre');
    //results.innerText = JSON.stringify(formJSON, null, 2);
    // console.log(results);
  }
  
  const form = document.getElementsByName('GeneralApplicationForm');
  document.getElementById("uploadFiles").addEventListener("click", handleFormSubmit);
  // const form = document.querySelector('form');
  // subbtn.addEventListener('click', handleFormSubmit);
  