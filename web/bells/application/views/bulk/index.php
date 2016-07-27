<h2>Bulk Entry Generator</h2>

<form method="post" id="generator">
    <input type="hidden" name="force" value="1">
    <table>
        <tr>
            <td>Schedule</td>
            <td>
                <select id="idBellProfile">
                    <?php foreach ($data['profiles'] as $profile) { ?>
                        <option value="<?= $profile->idBellProfile; ?>"><?= $profile->name; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Zone</td>
            <td>
                <select id="Zone">
                    <?php foreach ($data['zones'] as $zone) { ?>
                        <option value="<?= $zone->idBellZone; ?>"><?= $zone->name; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td><input id="from" type="date" value="<?= date('Y-m-d');?>"></td>
        </tr>
        <tr>
            <td>End Date</td>
            <td><input id="to" type="date" value="<?= date('Y-m-d');?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">Generate</button></td>
        </tr>
    </table>
</form>
<script>
    refresh_paused = false;
    $("#generator").on('submit',function(e){
        e.preventDefault();

        var d = {
            idBellDate: false,
            start: new Date($("#from").val()),
            end: new Date($("#to").val()),
            zone: $("#Zone").val(),
            idBellProfile: $("#idBellProfile").val()
        };

        update_cal(d,true);
    })
</script>