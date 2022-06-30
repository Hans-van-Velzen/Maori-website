function handleSubmit(event) {
    event.preventDefault();
  
    const data = new FormData(event.target);
  
    const value = Object.fromEntries(data.entries());

    // value.topics = data.getAll("topics");
  
    console.log({ value });
    document.getElementById("JSON").innerHTML = value;
  }

// SubButton = document.getElementById('submitBtn');

// SubButton.addEventListener('click', (e) => handleSubmit());
