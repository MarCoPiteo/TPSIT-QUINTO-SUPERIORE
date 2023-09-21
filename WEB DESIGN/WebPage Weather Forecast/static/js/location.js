async function checkLocation (lat, lng) {
    let url = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lng}&localityLanguage=en`
    //console.log(url)

    let resp = await fetch(url)
    let position = await resp.json()
    
    return position
}