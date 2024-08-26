
const formEls = document.querySelectorAll("form.form-destroyer");

formEls.forEach((formEl) => {
    formEl.addEventListener("submit", function(event){
        event.preventDefault();
        const userChoice = window.confirm("Are you sure you want to delete " + this.getAttribute("data-post-name") + "?");
        if (userChoice){
            this.submit();
        }
    });
});

