"use strict";

window.onload = () => {
    let search = this.document.getElementById("lookup");
    let search_cities = this.document.getElementById("lookup-cities");

    this.$("country").submit(function (e) {
        e.preventDefault();
    });
    search_cities.addEventListener("click", ()=>{
         this.$.ajax({
            type: "GET",
            url: "world.php",
            data: this.$("#country").serialize()+"&context=cities",
            success: function (data) {
                let result = document.getElementById("result");
                result.innerHTML = data;
            },
            dataType: "text"
        });
        
        
    } );
    search.addEventListener("click", () => {
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