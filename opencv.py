import cv2
import numpy as np

def encrypt_image(input_image, key_image):
    # Read input and key images
    input_img = cv2.imread(input_image, 0)
    key_img = cv2.imread(key_image, 0)

    # Resize key image to match input image size
    key_img = cv2.resize(key_img, (input_img.shape[1], input_img.shape[0]))

    # Perform XOR operation between input and key images
    cipher_img = cv2.bitwise_xor(input_img, key_img)

    return cipher_img

def decrypt_image(cipher_image, key_image):
    # Read cipher and key images
    cipher_img = cv2.imread(cipher_image, 0)
    key_img = cv2.imread(key_image, 0)

    # Resize key image to match cipher image size
    key_img = cv2.resize(key_img, (cipher_img.shape[1], cipher_img.shape[0]))

    # Perform XOR operation between cipher and key images
    decrypted_img = cv2.bitwise_xor(cipher_img, key_img)

    return decrypted_img

# Path to input and key images
input_image_path = 'input_image.jpg'
key_image_path = 'key_image.jpg'

# Encrypt the input image
cipher_image = encrypt_image(input_image_path, key_image_path)

# Save the cipher image
cv2.imwrite('cipher_image.jpg', cipher_image)

# Decrypt the cipher image
decrypted_image = decrypt_image('cipher_image.jpg', key_image_path)

# Save the decrypted image
cv2.imwrite('decrypted_image.jpg', decrypted_image)

# Display the input, key, cipher, and decrypted images
cv2.imshow('Input Image', cv2.imread(input_image_path))
cv2.imshow('Key Image', cv2.imread(key_image_path))
cv2.imshow('Cipher Image', cipher_image)
cv2.imshow('Decrypted Image', decrypted_image)
cv2.waitKey(0)
cv2.destroyAllWindows()
