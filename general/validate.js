function validateName(pattern) {
    var name = form.firstname.value;

    if (name == "" || pattern.test(name)) {
        document.getElementById("firstnameInvalid").style.visibility = "visible";
    } else {
        document.getElementById("firstnameInvalid").style.visibility = "hidden";
    }
    return true;
}
