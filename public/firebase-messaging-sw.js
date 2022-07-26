importScripts('https://www.gstatic.com/firebasejs/3.7.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.7.1/firebase-messaging.js');
 
// for Initialize Firebase
var configs = {
    apiKey: "AIzaSyC1BSkxdc2A2DZmA7dL7OEiXsVE5IF7FM0",
    authDomain: "crm-notifications-5a55c.firebaseapp.com",
    projectId: "crm-notifications-5a55c",
    storageBucket: "crm-notifications-5a55c.appspot.com",
    messagingSenderId: "157702125847",
    appId: "1:157702125847:web:77b1bd3b1ab40da36f1f52",
    measurementId: "G-4WK9KYP5PM"
};
firebase.initializeApp(configs);
 
const messaging = firebase.messaging();