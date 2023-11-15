document.addEventListener("DOMContentLoaded", function () {
    var avatar = document.getElementById("avatar");
    var menu = document.getElementById("menu");

    // Toggle hiển thị menu khi click vào avatar
    avatar.addEventListener("click", function () {
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    // Ẩn menu khi click ra ngoài
    document.addEventListener("click", function (event) {
        if (!avatar.contains(event.target)) {
            menu.style.display = "none";
        }
    });
});
