const webSocket = new WebSocket("ws://192.168.1.9:55641") //dummy url for localhost

// message from the web server to websocket
webSocket.onmessage = (event) => {
    handleSignallingData(JSON.parse(event.data))
}

function handleSignallingData(data) {
    switch (data.type) {
        case "offer":
            peerConn.setRemoteDescription(data.offer)
            createAndSendAnswer()
            break
        case "candidate":
            peerConn.addIceCandidate(data.candidate)
    }
}

function createAndSendAnswer () {
    peerConn.createAnswer((answer) => {
        peerConn.setLocalDescription(answer)
        sendData({
            type: "send_answer",
            answer: answer
        })
    }, error => {
        console.log(error)
    })
}

function sendData(data) {
    data.username = username
    webSocket.send(JSON.stringify(data))
}


let localStream
let peerConn
let username

function joinCall() {

    username = document.getElementById("username-input").value

    document.getElementById("video-call-div")
    .style.display = "inline"

    navigator.getUserMedia({ //a video stream from the device to the local video object
        video: { //getting the video: with specific details
            frameRate: 24,
            width: {
                min: 480, ideal: 720, max: 1280
            },
            aspectRatio: 1.33333
        },
        audio: true // getting the audio
    }, (stream) => {//the stream in the local video
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

        // Send candidate
        peerConn.onicecandidate = ((e) => {
            if (e.candidate == null)
                return
            
            sendData({
                type: "send_candidate", //so, now the server knows that we send this candidate to a person of username (whatever we specify)
                candidate: e.candidate
            })
        })

        sendData({
            type: "join_call"
        })

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