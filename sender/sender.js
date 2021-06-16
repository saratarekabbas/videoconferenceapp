// const webSocket = new WebSocket("ws://192.168.1.9:55641") //localhost
// const webSocket = new WebSocket("ws://127.0.0.1:62685") //localhost
const webSocket = new WebSocket("ws://192.168.1.9:62685") 

// message from the web server to websocket
webSocket.onmessage = (event) => {
    handleSignallingData(JSON.parse(event.data))
}

function handleSignallingData(data) {
    switch (data.type) {
        case "answer":
            peerConn.setRemoteDescription(data.answer)
            break
        case "candidate":
            peerConn.addIceCandidate(data.candidate)
    }
}

let username // A global username object
function sendUsername() {
// Getting the username from the input box
    username = document.getElementById("username-input").value
    // sending the username to the socket server
    sendData({
        type: "store_user"
    })//since the type is store user, then that means that we have to store the username
    // NOTE: If the type is store_offer, then that means that we have to store the offer,
    // NOTE: If the type is store_candidate, then that means that we have to store the ice candidate and so on
}

function sendData(data) {
    data.username = username
    webSocket.send(JSON.stringify(data))
}

// Managing the Start Call
let localStream //global localstream object
let peerConn  //global variable peerConn
function startCall() {
    document.getElementById("video-call-div")
    .style.display = "inline"

    navigator.getUserMedia({ //a video stream from the divice to the local video object
        video: { //getting the video: with specific details
            frameRate: 24,
            width: {
                min: 480, ideal: 720, max: 1280
            },
            aspectRatio: 1.33333
        },
        audio: true // getting the audio
    }, (stream) => { //the stream in the local video
        localStream = stream
        document.getElementById("local-video").srcObject = localStream

        // Creating a peer connection
        // => Configuration
        let configuration = {
            iceServers: [
                {
                    "urls": ["stun:stun.l.google.com:19302", 
                    "stun:stun1.l.google.com:19302", 
                    "stun:stun2.l.google.com:19302"]
                }
            ]
        }

        peerConn = new RTCPeerConnection(configuration)
        peerConn.addStream(localStream)

        peerConn.onaddstream = (e) => {
            document.getElementById("remote-video")
            .srcObject = e.stream
        }

        peerConn.onicecandidate = ((e) => {
            if (e.candidate == null)
                return
            sendData({
                type: "store_candidate",
                candidate: e.candidate
            })
        })
        // send offer
        createAndSendOffer()
    }, (error) => {
        console.log(error)
    })
}

// send offer function
function createAndSendOffer() {
    peerConn.createOffer((offer) => {
        sendData({
            type: "store_offer",
            offer: offer
        })

        peerConn.setLocalDescription(offer)
    }, (error) => {
        console.log(error)
    })
}

// Mute audio function
let isAudio = true
function muteAudio() {
    isAudio = !isAudio
    // to add more than one audio track, we change the 0. however, 0 adds only one audio track.
    localStream.getAudioTracks()[0].enabled = isAudio
}

let isVideo = true
function muteVideo() {
    isVideo = !isVideo
    localStream.getVideoTracks()[0].enabled = isVideo
}