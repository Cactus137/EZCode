<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary disabled" rel="noopener">Documentation</a></li>
                    <li class="list-inline-item"><a href="./license.html" class="link-secondary disabled">License</a></li>
                    <li class="list-inline-item"><a href="https://github.com/Cactus137/EZCode" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                    <li class="list-inline-item">
                        <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary disabled" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-cactus text-success icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 9v1a3 3 0 0 0 3 3h1" />
                                <path d="M18 8v5a3 3 0 0 1 -3 3h-1" />
                                <path d="M10 21v-16a2 2 0 1 1 4 0v16" />
                                <path d="M7 21h10" />
                            </svg>
                            Cactus
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; 2024
                        <a href="." class="link-secondary">EZCode</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="./changelog.html" class="link-secondary" rel="noopener">
                            FPT Polytechnic Ha Noi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script>
    var themeStorageKey = "tablerTheme";
    var defaultTheme = "light";

    // Định nghĩa hàm để thay đổi chủ đề
    function toggleTheme() {
        var selectedTheme = localStorage.getItem(themeStorageKey) || defaultTheme;

        // Đảo ngược giá trị chủ đề
        selectedTheme = selectedTheme === 'dark' ? 'light' : 'dark';

        // Lưu giá trị chủ đề mới vào localStorage
        localStorage.setItem(themeStorageKey, selectedTheme);

        // Thiết lập hoặc xóa thuộc tính data-bs-theme của thẻ body
        if (selectedTheme === 'dark') {
            document.body.setAttribute("data-bs-theme", selectedTheme);
        } else {
            document.body.removeAttribute("data-bs-theme");
        }

        // Cập nhật trạng thái nút
        updateButtonState(selectedTheme);
    }

    // Hàm để cập nhật trạng thái nút
    function updateButtonState(theme) {
        var enableDarkmodeButton = document.getElementById("enableDarkmodeButton");
        var enableLightmodeButton = document.getElementById("enableLightmodeButton");

        if (theme === 'dark') {
            enableDarkmodeButton.style.display = "none";
            enableLightmodeButton.style.display = "block";
            document.body.setAttribute("data-bs-theme", 'dark');
        } else {
            enableDarkmodeButton.style.display = "block";
            enableLightmodeButton.style.display = "none";
        }
    }

    // Khởi tạo trạng thái ban đầu
    updateButtonState(localStorage.getItem(themeStorageKey) || defaultTheme);

    // Gắn sự kiện onclick cho nút enableDarkmodeButton
    var enableDarkmodeButton = document.getElementById("enableDarkmodeButton");
    if (enableDarkmodeButton) {
        enableDarkmodeButton.onclick = function() {
            toggleTheme();
        };
    }

    // Gắn sự kiện onclick cho nút enableLightmodeButton
    var enableLightmodeButton = document.getElementById("enableLightmodeButton");
    if (enableLightmodeButton) {
        enableLightmodeButton.onclick = function() {
            toggleTheme();
        };
    }
</script>