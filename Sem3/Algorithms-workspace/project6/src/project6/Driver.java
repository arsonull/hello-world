package project6;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class Driver
{
	public static void main(String[] args)
	{
		try
		{
			/*File f = new File("TreeWords.txt");
			Scanner sc = new Scanner(f);*/
			Tree myTree = new Tree();
			BufferedReader br = new BufferedReader(new FileReader("TreeWords.txt"));
			Scanner sc = new Scanner(System.in);
			String line;
			//Adds each line from the file to the tree as Nodes
			while ((line = br.readLine()) != null)
			{
				Node n = new Node(line);
				myTree.addNode(n);
			}
			myTree.display();
			
			//Initialize an int for choice, and a string for words to search or delete
			int in = 1;
			String sin;
			while (in > 0)
			{
				System.out.println("1-search, 2-delete, 0-quit");
				in = Integer.parseInt(sc.nextLine());
				if (in == 1)
				{
					System.out.println("Enter the word you want to search for");
					sin = sc.nextLine();
					System.out.println(myTree.search(sin));
					myTree.display();
				}
				else if (in == 2)
				{
					System.out.println("Enter the word you want to delete");
					sin = sc.nextLine();
					myTree.delete(sin);
					myTree.display();
				}
				else if (in <= 0)
				{
					System.out.println("Quitting...");
				}
			}
		}
		catch (IOException e)
		{
			
		}
	}
}
