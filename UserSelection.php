<?php
$title="User Selection";
include "header.php";
?>

<!DOCTYPE html>
<html>
<?php
//$title = "Header";
//include "header.php";
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="userSelection.css">
</head>

<body>

    <div class="tab">
        <button class="tablinks" onclick="userSelect('GENERAL', this, 'rgb(88, 143, 88)')" id="defaultOpen">GENERAL MANAGER</button>
        <button class="tablinks" onclick="userSelect('OPERATIONS', this, 'rgb(218, 192, 45)')">OPERATIONS MANAGER</button>
        <button class="tablinks" onclick="userSelect('DUEDILIGENCE', this, 'rgb(88, 143, 88)')">DUE DILIGENCE TEAM</button>
        <button class="tablinks" onclick="userSelect('DELIVERY', this, 'rgb(218, 192, 45)')">DELIVERY TEAM</button>
        <button class="tablinks" onclick="userSelect('MARKETERS', this, 'rgb(88, 143, 88)')">MARKETERS</button>
    </div>

    <div id="GENERAL" class="tabcontent">
        <button onclick="location.href='viewDuediligIndex.php'">
            View Due Diligence Index
        </button>

        <button onclick="location.href='viewRecollection.php'">
            View Recollection
        </button>
    </div>

    <div id="OPERATIONS" class="tabcontent">
        <button onclick="location.href='viewInventoryIndex.php'">
            View Inventory Index
        </button>

        <button onclick="location.href='addToInventory.php'">
            Add To Inventory
        </button>

        <button onclick="location.href='addToPricelist.php'">
            Add To Pricelist
        </button>
    </div>

    <div id="DUEDILIGENCE" class="tabcontent">
        <button onclick="location.href='addToDuediligIndex.php'">
            Add To Due Diligence
        </button>

        <button onclick="location.href='viewGuarantor.php'">
            View Guarantor
        </button>

        <button onclick="location.href='viewCustomers.php'">
            View Customers
        </button>

        <button onclick="location.href='addToDelivery.php'">
            Add To Delivery
        </button>
    </div>

    <div id="DELIVERY" class="tabcontent">
        <button onclick="location.href='viewDuediligIndex.php'">
            View Due Diligence Index
        </button>

        <button onclick="location.href='viewLocation.php'">
            View Location
        </button>

        <button onclick="location.href='viewDelivery.php'">
            View Delivery
        </button>
    </div>

    <div id="MARKETERS" class="tabcontent">
        <button onclick="location.href='addToCustomers.php'">
            Add To Customers
        </button>

        <button onclick="location.href='viewPricelistIndex.php'">
            View Pricelist Index
        </button>

        <button onclick="location.href='addToRecollection.php'">
            Add To Recollection
        </button>

        <button onclick="location.href='addToGuarantor.php'">
            Add To Guarantor
        </button>
    </div>

    <script>
        function userSelect(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
            }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>