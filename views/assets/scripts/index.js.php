<script>
    $(document).ready(function() {

        $.ajax({
            type: 'POST',
            url: 'api-users',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $(".tblMigrations tbody").html("");
                $.each(data, function(index, item) {
                    let $tr = $("<tr data-id=" + item[0] + " >").append(
                        $("<td>").text(item[0]),
                        $("<td>").text(item[1]),
                        $("<td>").text(item[2]),
                        $("<td>").html("<button class='btn btn-info editMigration'>Edit</button> <button class='btn btn-danger deleteMigration'>Delete</button>")
                    );
                    $tr.appendTo(".tblMigrations tbody");
                });
            }
        });

        $(".addMigration").click(function() {
            $("#modalAddEditMigration").modal("show");
            let id = $("#modalAddEditMigration .id").val(0);
        });

        $("#modalAddEditMigration").on("click", ".btnSaveMigration", function() {
            let id = $("#modalAddEditMigration .id").val();
            let migration = $("#modalAddEditMigration .migration").val();
            let batch = $("#modalAddEditMigration .batch").val();
            validateMigration(id, migration, batch);
        });

        $(".tblMigrations").on("click", ".editMigration", function() {
            let migrationid = $(this).closest("tr").data("id");
            $("#modalAddEditMigration").modal("show");
            findMigration(migrationid);
        });

        $(".tblMigrations").on("click", ".deleteMigration", function() {
            let migrationid = $(this).closest("tr").data("id");
            deleteMigration(migrationid);
        });

        function validateMigration(id, migration, batch) {
            if( (migration.length == 0) || (batch.length == 0) || (isNaN(batch)) ) {
                (migration.length == 0) ? $("#modalAddEditMigration .migration").css("border-color", "red") : $("#modalAddEditMigration .migration").css("border-color", "green");
                (batch.length == 0) ? $("#modalAddEditMigration .batch").css("border-color", "red") : $("#modalAddEditMigration .batch").css("border-color", "green");
                isNaN(batch) ? $("#modalAddEditMigration .batch").css("border-color", "red") : $("#modalAddEditMigration .batch").css("border-color", "green");
            } else {
                $("#modalAddEditMigration .migration").css("border-color", "green");
                $("#modalAddEditMigration .batch").css("border-color", "green");
                insertUpdateMigration(id, migration, batch)
            }
        }

        function insertUpdateMigration(id, migration, batch) {
            $.ajax({
                type: 'POST',
                url: 'api-users-insertupdate',
                dataType: 'json',
                data: {
                    id: id,
                    migration: migration,
                    batch: batch
                },
                success: function(data) {
                    console.log(data);
                    if (data) {
                        alert("Migration has been "+ data);
                        location.reload();
                    } else {
                        alert("Error!!");
                    }
                }
            });
        }

        function findMigration(id) {
            $.ajax({
                type: 'POST',
                url: 'api-users-find',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    // console.log(response.data.id);
                    let id = $("#modalAddEditMigration .id").val(response.data.id);
                    let migration = $("#modalAddEditMigration .migration").val(response.data.migration);
                    let batch = $("#modalAddEditMigration .batch").val(response.data.batch);
                }
            });
        }

        function deleteMigration(id) {
            $.ajax({
                type: 'POST',
                url: 'api-users-delete',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    alert("Migration has been "+response);
                    location.reload();
                }
            });
        }

    });
</script>