<?php
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Insert</title>
</head>
<style>
    .modal{
        animation: slidedown 0.5s ease-in-out;
    }

    @keyframes slidedown {
        from{
            opacity: 0;
            top: -300px;
        }
        to{
            opacity: 1;
            top: 0;
        }
    }
</style>
<body>

    <div id="modal" class="fixed hidden w-full h-screen bg-black/70">
        <div class="modal flex items-center justify-center h-fit p-10 bg-white m-auto w-[30%] rounded-lg relative mt-30">
            <span id="close" class="absolute -top-5 -right-5 cursor-pointer bg-red-500 text-white p-2 rounded-lg uppercase">
                close
            </span>
            <form action="insert.php" method="post" class="flex flex-col gap-2 rounded-lg shadow-sm shadow-[#000000]/60 p-5 w-[100%]">
                <label for="email">Email:</label>
                <input type="text" name="email" class="rounded-md border border-gray-300 px-3 py-2" placeholder="Enter Email">
                <label for="password">Password:</label>
                <input type="text" name="password"  class="rounded-md border border-gray-300 px-3 py-2" placeholder="Enter Password">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Submit</button>
            </form>
        </div>
    </div>

    <div id="modaldencrypted" class="fixed hidden w-full h-screen bg-black/70">
        <div class="modal flex items-center justify-center h-fit p-10 bg-white m-auto w-[30%] rounded-lg relative mt-30">
            <span id="closedecrypted" class="absolute -top-5 -right-5 cursor-pointer bg-red-500 text-white p-2 rounded-lg uppercase">
                close
            </span>
            <form action="insertdecrypted.php" method="post" class="flex flex-col gap-2 rounded-lg shadow-sm shadow-[#000000]/60 p-5 w-[100%]">
                <label for="email">Email:</label>
                <input type="text" name="email" class="rounded-md border border-gray-300 px-3 py-2" placeholder="Enter Email">
                <label for="password">Password:</label>
                <input type="text" name="password"  class="rounded-md border border-gray-300 px-3 py-2" placeholder="Enter Password">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Submit</button>
            </form>
        </div>
    </div>

    <div class="p-6 bg-gray-100 min-h-screen flex flex-col">
    <button id="open" class="w-fit px-5 py-2 bg-blue-500 text-white rounded-md cursor-pointer">
        + Add Account
    </button>

    <div class="mt-6 w-full max-w-3xl bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-500/40 text-white text-center ">
                    <th class="p-3 text-black">Email</th>
                    <th class="p-3 text-black">Password (MD5)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `user`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='border-b hover:bg-gray-100 transition text-center'>";
                        echo "<td class='p-3'>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td class='p-3'>" . htmlspecialchars($row['password']) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <button id="opendecrypted" class=" mt-10 w-fit px-5 py-2 bg-blue-500 text-white rounded-md cursor-pointer">
        + Add Account
    </button>
    <div class="mt-6 w-full max-w-3xl bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-500/40 text-white text-center ">
                    <th class="p-3 text-black">Email</th>
                    <th class="p-3 text-black">Password (not encrypted)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `user2`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='border-b hover:bg-gray-100 transition text-center'>";
                        echo "<td class='p-3'>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td class='p-3'>" . htmlspecialchars($row['password']) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<script>
    var modal = document.getElementById("modal");
    var open = document.getElementById("open");
    var close = document.getElementById("close");

    open.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

    close.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    var modaldencrypted = document.getElementById("modaldencrypted");
    var opendecrypted = document.getElementById("opendecrypted");
    var closedecrypted = document.getElementById("closedecrypted");

    opendecrypted.addEventListener("click", () => {
        modaldencrypted.classList.remove("hidden");
    });

    closedecrypted.addEventListener("click", () => {
        modaldencrypted.classList.add("hidden");
    });
</script>