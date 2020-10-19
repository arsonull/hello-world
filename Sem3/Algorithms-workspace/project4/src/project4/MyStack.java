package project4;


public class MyStack
{
	Node head = null;
	Node tail = null;
	int size = 0;
	
	//For instantiating a stack with the first node
	public MyStack(MazeCell n)
	{
		Node no = new Node(n);
		head = no;
		tail = no;
		size = 1;
	}
	
	public void push(MazeCell n)
	{
		Node no = new Node(n, head);
		head = no;
		if (tail == null)
		{
			tail = no;
		}
		size++;
	}
	public void pop()
	{
		head = head.getNext();
		size--;
	}
	public MazeCell top()
	{
		return head.getData();
	}
	public int size()
	{
		return size;
	}
	public boolean empty()
	{
		if(size == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}