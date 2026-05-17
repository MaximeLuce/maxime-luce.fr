const makeKeySequenceListener = (keySequence, callback) => {
  let index = 0;

  return (e) => {
    // Keystroke matches the target one for our current position
    if (e.key === keySequence[index]) {
      // Success! Invoke the callback.
      if (index === keySequence.length - 1) {
        callback();
      }
      // Move up, wrapping as needed
      index = (index + 1) % keySequence.length;
    } else {
      // Key didn't match; start over
      index = 0;
    }
  };
};

const listener = makeKeySequenceListener('newwindow', () => {
  alert("Bravo ! Vous avez trouvé l'easter-egg. Je l'ai surement fait en écoutant The Cure.");
});
document.addEventListener('keyup', listener);