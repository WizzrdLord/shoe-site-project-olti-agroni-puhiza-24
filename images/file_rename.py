import os

def rename_folders_in_directory(directory_path):
    try:
        folder_names = [f for f in os.listdir(directory_path) if os.path.isdir(os.path.join(directory_path, f))]
        folder_names.sort()

        for index, folder_name in enumerate(folder_names, start=1):
            old_path = os.path.join(directory_path, folder_name)
            new_folder_name = f"Prod_{index}"
            new_path = os.path.join(directory_path, new_folder_name)

            os.rename(old_path, new_path)

        print("Folders renamed successfully!")

    except Exception as e:
        print(f"An error occurred: {e}")

directory_path = "images"
rename_folders_in_directory(directory_path)
