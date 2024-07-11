(() => {
    const form = document.getElementById("form");
    form.addEventListener("submit", onSubmit);
})();

async function onSubmit(event) {
    event.preventDefault()

    
    let formData = new FormData(form);

    let firstname = formData.get("firstname");
    let secondname = formData.get("secondname");

    let reqobj = {
        "firstname": firstname,
        "secondname": secondname,
    }
    
    try {
        const response = await fetch("/submit2.php", { "body": JSON.stringify(reqobj), "method": "GET" });
        if (!response.ok) {
          throw new Error(`Response status: ${response.status}`);
        }
        const jsonResp = await response.json();
                
        let resultParagraph = document.getElementById("result-paragraph");
        resultParagraph.textContent = jsonResp;

      } catch (error) {
        console.error(error.message);
      }
}