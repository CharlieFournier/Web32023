<div class="col-9 test1">

<a href="AjoutEvents.php"> <button class="btn-index"> Ajout Events </button> </a>

<div class="row p-0 align-items-center">

    <?php while ($row = $result2->fetch_assoc()) { ?>
        <div class="col-4">
            <a href="modificationEvents.php?id=<?php echo $row["id"] ?>" id="Link">

                <div class="card">
                    <div>
                        <h2><?php echo $row["nomEvent"] ?></h2>
                    </div>
                </div>

            </a>
        </div>
    <?php    } ?>

</div>


</div>

//---------------------------------------------------------------------------------------------------------------------

<div class="col-3 ">

<a href="AjoutUser.php"> <button class="btn-index"> Ajout User </button> </a>

<div class="row p-0 align-items-center">

    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="col-4">
            <a href="modificationUser.php?id=<?php echo $row["id"] ?>" id="Link">

                <div class="card">
                    <div>
                        <h2><?php echo $row["user"] ?></h2>
                    </div>
                </div>

            </a>
        </div>
    <?php    } ?>

</div>


</div>

//-------------------------------------------------------------------------------------------------------------------------