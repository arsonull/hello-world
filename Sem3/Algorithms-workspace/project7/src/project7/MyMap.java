package project7;

public class MyMap
{
	private Node[] map;
	private final int SIZE = 11;
	private final int HASH = 11;
	
	public MyMap()
	{
		map = new Node[SIZE];
	}
	
	public void addNode(String s) //O(1)
	{
		int sval = 0;
		char[] cArr = s.toCharArray();
		for (int i = 0; i < s.length(); i++)
		{
			sval = sval + cArr[i];
		}
		int hash = sval % HASH;
		Node n = new Node(s);
		/*if (map[hash] != null) n.setNext(map[hash]);
		else map[hash] = n;*/
		n.setNext(map[hash]);
		map[hash] = n;
		System.out.println(n.getData() + " has a hash value of " + hash);
	}
	
	public boolean find(String s) //O(log n)
	{
		int sval = 0;
		char[] cArr = s.toCharArray();
		for (int i = 0; i < s.length(); i++)
		{
			sval = sval + cArr[i];
		}
		//int hash = Integer.parseInt(String.valueOf(s.toCharArray())) % HASH;
		int hash = sval % HASH;
		System.out.println("Looking in index " + hash);
		Node temp = map[hash];
		int count = 1;
		if (map[hash] == null)
		{
			System.out.println("Not here");
			return false;
		}
		if (map[hash].getData().compareTo(s) == 0)
		{
			System.out.println("Found after 1 element at index " + hash);
			return true;
		}
		else
		{
			while (temp != null)
			{
				count++;
				if (temp.getData().compareTo(s) == 0)
				{
					System.out.println("Found after " + count + " elements at index " + hash);
					return true;
				}
				temp = temp.getNext();
			}
		}
		System.out.println("Not here after " + count + " elements");
		return false;
	}
	
	public void display() //O(n)
	{
		Node temp;
		for (int i = 0; i < SIZE; i++)
		{
			int x = i % HASH;
			temp = map[x];
			System.out.print("index " + x + ": ");
			while (temp != null)
			{
				System.out.print(temp.getData() + " ");
				temp = temp.getNext();
			}
			System.out.println();
		}
	}
}
