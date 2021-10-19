// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAJoY98qj387s64h4_dVVmAk0aHsGPMzuA",
    authDomain: "pet-life-ab8d3.firebaseapp.com",
    projectId: "pet-life-ab8d3",
    storageBucket: "pet-life-ab8d3.appspot.com",
    messagingSenderId: "122430054317",
    appId: "1:122430054317:web:1cbc0a507c4536b7054b24"
  };

// Initialize Firebase
const app = firebase.initializeApp(firebaseConfig);
const messaging = app.messaging();

self.addEventListener('push', event => {
  let data = {}

  if (event.data) {
    data = event.data.json()
  }
  
  if (data.notification && data.notification.title) {
    self.registration.showNotification(data.notification.title, {
      body: JSON.parse(data.notification.body).message,
      data
    })
  } else {
    console.log('SW: No notification payload, not showing notification')
  }
})