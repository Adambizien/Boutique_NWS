<footer class="footer mt-3 py-3 bg-body-tertiary ">
    <div class="container">
        <span class="text-body-secondary">
        Si tu cherches à copier "Tu vas partir mal mon copain, je te le dis, sur le caveau de mon père et de ma mère, tu vas partir mal. 
        Venez ! 
        Si vous êtes des hommes, je vous attends !".
        </span>
    </div>
</footer>
</body>
<script >
//dropdown profils
var dropdownProfils = document.getElementById("dropdownProfils");
dropdownProfils.addEventListener("click", function() {
var dropdownMenu = this.querySelector('.dropdown-menu');
if (dropdownMenu.style.display === "block") {
    dropdownMenu.style.display = "none";
} else {
    dropdownMenu.style.display = "block";
}
});

var dropdownCategory = document.getElementById("dropdownCategory");
dropdownCategory.addEventListener("click", function() {
var dropdownMenu = this.querySelector('.dropdown-menu');
if (dropdownMenu.style.display === "block") {
    dropdownMenu.style.display = "none";
} else {
    dropdownMenu.style.display = "block";
}
});
</script>

</html>