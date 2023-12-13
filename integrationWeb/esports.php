
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="esports.css">
    <title>CAT</title>

</head>


    <div id="container">
        <div id="inputcon">
        <h2>Learn About you Cat</h2>
        <h3>Input your cat's breed below!</h3>
        <textarea name="catBreed" id="breedinput" cols="30" rows="10" placeholder="input cat breed here"></textarea>
        <button id="BtnCat">Learn more</button>

        <table>
            <thead>
                <tr>

                </tr>

            </thead>
            <tbody>
            <tr>
                    <td style="color: black">Name:</td><td id="name" style="color: black"></td>
                </tr>
                <tr>
                    <td style="color: black">Origin:</td><td id="origin" style="color: black"></td>
                </tr>
                <tr>
                    <td style="color: black">Life Expectancy:</td><td id="expect" style="color: black"></td>
                </tr>
                <tr>
                    <td style="color: black">Playfulness:</td><td id="playfulness" style="color: black"></td>
                </tr>
                <tr>
                    <td style="color: black">Family Friendliness:</td><td id="familyFriendly" style="color: black"></td>
                </tr>
                <tr>
                    <td style="color: black">Pet Friendliness:</td><td id="pet" style="color: black"></td>
                </tr>
                <tr>
                    <td style="color: black">Shedding:</td><td id="shedding" style="color: black"></td>
                </tr>
                

            </tbody>
        </table>
        </div>
    </div>

</body>
<script language="JavaScript" type="text/javascript" src="jquery.js"></script>
<script>

$("#BtnCat").on("click", function() {
    
    var name = $("#breedinput").val();
    fetchName(name);

})

    async function fetchName(name) {
    const url = 'https://api.api-ninjas.com/v1/cats?name=' + name;
    const options = {
	method: 'GET',
	headers: { 'X-Api-Key': 'xtVtL50r44fn9z9/JKvAVA==JfJOTD1suQFbLaYL'},
    contentType: 'application/json'
};

try {
	const response = await fetch(url, options);
	const result = await response.text();
    const jObj = JSON.parse(result); //JSON object with info
	console.log(result); //log to consol received JSON data in string form
    console.log(jObj[0].name); // change name to any variable needed from JSON
    
    document.getElementById("name").innerHTML = jObj[0].name;
    document.getElementById("origin").innerHTML = jObj[0].origin;
    document.getElementById("playfulness").innerHTML = jObj[0].playfulness;
    document.getElementById("familyFriendly").innerHTML = jObj[0].family_friendly;
    document.getElementById("shedding").innerHTML = jObj[0].shedding;
    document.getElementById("expect").innerHTML = jObj[0].max_life_expectancy;
    document.getElementById("pet").innerHTML = jObj[0].other_pets_friendly;
} catch (error) {
	console.error(error);
}
}

</script>
</html>
