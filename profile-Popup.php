<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dark-mode {
            background-color: #000;
            color: #eef4fc;
        }

        .profile-popup-container {
            padding: 7px 5px 3px 5px;
            background-color: #27272b;
            color: #eef4fc;
            font-size: 18px;
            width: fit-content;
            padding-right: 17px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .box {
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(128, 128, 128, 0.5);
            padding-bottom: 7px;
            display: flex;
            align-items: center;
        }

        .box>button {
            padding: 10px 12px;
            font-size: 1.1rem;
            font-weight: 100;
            width: 180px;
            background: #5792ee;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .box>button:hover {
            background: #457bc8;
        }

        .boxs {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .part {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .part.beta {
            background-color: #007bff;
            color: white;
            border-radius: 3px;
            padding: 2px 5px;
            font-size: 0.75rem;
            margin-left: 5px;
        }

        .toggle-switch {
            position: relative;
            width: 50px;
            height: 24px;
            margin-left: 10px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4caf50;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
</head>

<body>
    <div class="profile-popup-container">
        <div class="box">
            <button>Hackos: 2054</button>
        </div>
        <div class="box ">Profile</div>
        <div class="box boxs">
            <div class="part">Dark Mode<span class="part beta">BETA</span></div>
            <label class="toggle-switch">
                <input type="checkbox" id="darkModeToggle">
                <span class="slider"></span>
            </label>
        </div>
        <div class="box">Leaderboard</div>
        <div class="box">Settings</div>
        <div class="box">Bookmarks</div>
        <div class="box">Network</div>
        <div class="box">Submissions</div>
        <div class="box">Administration</div>
        <div class="box">Logout</div>
    </div>


    <script>
        function applyDarkMode() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                document.getElementById('darkModeToggle').checked = true;
            } else {
                document.body.classList.remove('dark-mode');
                document.getElementById('darkModeToggle').checked = false;
            }
        }

        applyDarkMode();

        document.getElementById('darkModeToggle').addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    </script>
</body>

</html>
