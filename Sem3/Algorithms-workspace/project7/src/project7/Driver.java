package project7;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class Driver
{

	public static void main(String[] args)
	{
		try
		{
			MyMap map = new MyMap();
			BufferedReader br = new BufferedReader(new FileReader("TreeWords.txt"));
			Scanner sc = new Scanner(System.in);
			String line;
			while ((line = br.readLine()) != null)
			{
				map.addNode(line);
			}
			map.display();
			map.find("heard");
			map.find("did");
			map.find("are");
			map.find("naught");
			//sc.hasNextLine();
		}
		catch (IOException e)
		{
			e.printStackTrace();
		}
	}

}
