# Kwento-Ko-To

![Kwento-Ko-To Logo](logo.png)

Kwento-Ko-To is an innovative social media platform powered by PHP and Firebase emulators, providing a seamless integration of user authentication, functions, and Firestore. It is designed to cater to storytelling enthusiasts, offering a dynamic and engaging environment to share narratives and connect with a community of fellow storytellers.

## Key Features

- **Account Creation**: Seamlessly create your Kwento-Ko-To account and personalize your profile.
- **User Authentication**: Securely authenticate users using Firebase emulators for enhanced data privacy.
- **Firestore Integration**: Leverage Firestore, the NoSQL database, to store and manage user-generated content efficiently.
- **Realistic Emulation**: Utilize Firebase emulators to test and develop user authentication and database functionalities locally.
- **Post Creation**: Share your stories, anecdotes, and experiences.
- **Interactive Engagement**: Engage with other users through likes and comments on their posts.
- **Vibrant Communities**: Connect with like-minded individuals and form communities around specific topics or interests.
- **User-Friendly Interface**: Enjoy a smooth and intuitive user experience with a clean and visually appealing interface.

## Getting Started

To get started with Kwento-Ko-To, follow these steps:

1. Clone the repository:
```
git clone https://github.com/klyneajido/Kwento-Ko-To.git
```

2. Delete the vendor folder (optional, if needed, for a fresh install):
```
rm -rf vendor
```

3. Reinstall the necessary dependencies using Composer:
```
composer install
```

4. Install the necessary PHP extensions (if not already installed) and configure your PHP environment to meet the requirements of Kwento-Ko-To.

5. Configure the Firebase emulators:
   - Install Firebase CLI (Command Line Interface) by following the instructions in the official documentation: [Firebase CLI Installation](https://firebase.google.com/docs/cli#install_the_firebase_cli).
   - Set up Firebase emulators locally for local testing. Run the following commands in your project directory:

```
firebase emulators:start
```

6. Set up your Firebase project for local testing:
   - Create a new Firebase project on the Firebase Console: [Firebase Console](https://console.firebase.google.com/).
   - Obtain your Firebase project configuration, including your Web API key, in the Firebase project settings.

7. Integrate Firebase user authentication and Firestore database into the PHP codebase:
   - Utilize the Firebase PHP SDK to handle user authentication and Firestore interactions. Refer to the official Firebase PHP SDK documentation for guidance: [Firebase PHP SDK Documentation](https://firebase-php.readthedocs.io/en/latest/).

8. Customize the platform by modifying the design, branding, and features according to your preferences.

9. Launch the platform and start sharing your stories with the Kwento-Ko-To community.

After setting up the Firebase emulator, ensure you run the following commands in separate terminals:

- In one terminal, run the Firebase emulator with the command:
```
firebase emulators:start
```

- In another terminal, run the PHP development server to host the application on your local machine:
```
php -S localhost:8000
```

Now, you can access Kwento-Ko-To by navigating to `localhost:8000/login.php` in your web browser. Enjoy storytelling and connecting with the Kwento-Ko-To community on your local development environment. If you encounter any issues, refer to the official Firebase documentation or seek help from relevant developer communities. Happy storytelling!

## Support

For any issues, questions, or suggestions regarding Kwento-Ko-To, please [open an issue](https://github.com/klyneajido/Kwento-Ko-To/issues). I appreciate your feedback and will address your concerns promptly.

Let the storytelling begin! Join Kwento-Ko-To and share your captivating tales with the world.

Screenshots:
!Credits to Darin S for the Yeti login form!
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/b095d147-5361-4f3f-b3a5-2bc077933e21)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/4e3fcfdf-9a05-4d2b-a5b4-69cfd0bdf1c8)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/c6de4ab7-92bc-4cc6-96b0-083e21193e20)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/12121d0f-cb22-4bd5-a1ea-f36e84e7a0fd)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/31a75bcb-d2df-42d6-878a-969d0e035d71)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/8dbfc08b-92aa-46ae-b975-7cba7c3e1b80)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/bbc7f41c-3b10-44a6-b6c3-0ad24a93b4d1)
![image](https://github.com/klyneajido/Kwento-Ko-To/assets/139476987/65a2b07e-79e7-4822-ad7c-439a3f6110e6)




