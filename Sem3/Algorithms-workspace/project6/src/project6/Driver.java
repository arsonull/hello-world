package project6;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class Driver
{
	public static void main(String[] args)
	{
		try
		{
			File f = new File("TreeWords.txt");
			Scanner sc = new Scanner(f);
		}
		catch (FileNotFoundException e)
		{
			
		}
	}
}
