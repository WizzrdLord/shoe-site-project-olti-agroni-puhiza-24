import os

def rename_files(directory, base_name):
    # Get the list of files in the specified directory
    files = os.listdir(directory)

    # Filter out non-file entries
    files = [f for f in files if os.path.isfile(os.path.join(directory, f))]

    # Iterate through the files and rename them
    for idx, file_name in enumerate(files, 1):
        # Get the file extension
        file_extension = os.path.splitext(file_name)[1]
        
        # Create the new file name with the base name and variation
        new_file_name = f"{base_name}_{idx}{file_extension}"
        
        # Get the full file paths
        old_file_path = os.path.join(directory, file_name)
        new_file_path = os.path.join(directory, new_file_name)
        
        # Rename the file
        os.rename(old_file_path, new_file_path)
        print(f"Renamed: {file_name} -> {new_file_name}")

# Example usage
directory = "/path/to/your/folder"  # Replace with the path to your folder
base_name = "myfile"  # Replace with the base name you want
rename_files(directory, base_name)
