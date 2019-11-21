"use strict";

window.onload = () => {
    let search = this.document.getElementById("lookup");

    this.$("country").submit(function (e) {
        e.preventDefault();
    });

    search.addEventListener("click", () => {
        console.log("Test");
        this.$.ajax({
            type: "GET",
            url: "world.php",
            data: this.$("#country").serialize(),
            success: function (data) {
                let result = document.getElementById("result");
                result.innerHTML = data;
            },
            dataType: "text"
        });
    });
};