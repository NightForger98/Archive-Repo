package Snake;

import java.awt.*;
import java.awt.event.*;
import java.util.Random;

import javax.swing.*;

public class GamePanel extends JPanel implements ActionListener{
	static final int Screen_Width = 1200;
	static final int Screen_Height = 600;
	static final int Unit_Size = 32;
	static final int Game_Units = (Screen_Width*Screen_Height)/Unit_Size;
	static final int Delay = 60;
	final int x[] = new int[Game_Units];
	final int y[] = new int[Game_Units];
	int bodyParts = 80;
	int preyEaten=80;
	int preyX;
	int preyY;
	char direction = 'R';
	boolean running = false;
	Timer timer;
	Random random;
	public GamePanel() {
		random = new Random();
		this.setPreferredSize(new Dimension(Screen_Width,Screen_Height));
		this.setBackground(Color.DARK_GRAY);
		this.setFocusable(true);
		this.addKeyListener(new MyKeyAdapter());
		startGame();
	}
	public void startGame() {
		newPrey();
		running = true;
		timer = new Timer(Delay,this);
		timer.start();
		
		
	}
	public void paintComponent(Graphics g) {
		super.paintComponent(g);
		draw(g);
	}
	public void draw(Graphics g) {
		if(running) {
			//Grid
			/*
			for(int i=0; i<Screen_Height/Unit_Size;i++) {
				g.drawLine(i*Unit_Size, 0, i*Unit_Size, Screen_Height);
				g.drawLine(0,i*Unit_Size, Screen_Width,i*Unit_Size);
				}
			*/
			g.setColor(Color.red);
			g.fillOval(preyX, preyY, Unit_Size, Unit_Size);
			for(int i = 0; i < bodyParts;i++) {
				if(i == 0) {
					g.setColor(Color.green);
					g.fillRect(x[i], y[i], Unit_Size, Unit_Size);
				}
			else {
				g.setColor(new Color(45,180,0));
				//optional
				g.setColor(new Color(0,random.nextInt(255),0));
				g.fillRect(x[i], y[i], Unit_Size, Unit_Size);
				}
			}
			g.setColor(Color.cyan);
			g.setFont(new Font("Garamond",Font.CENTER_BASELINE,40));
			FontMetrics metrics = getFontMetrics(g.getFont());
			g.drawString("Score: " + preyEaten,  (Screen_Width - metrics.stringWidth("Score: " + preyEaten))/2, g.getFont().getSize());
		}	
		else {
			gameOver(g);
		}
	}
	public void newPrey() {
		preyX = random.nextInt((int)(Screen_Width/Unit_Size))*Unit_Size;
		preyY = random.nextInt((int)(Screen_Height/Unit_Size))*Unit_Size;
		
	}

	public void move() {
		for(int i = bodyParts; i>0;i--){
			x[i] = x[i-1];
			y[i] = y[i-1];
		}
		switch(direction) {
		case 'U':
			y[0] = y[0] -Unit_Size;
			break;
		case 'R':
			x[0] = x[0] + Unit_Size;
			break;
		case 'D':
			y[0] = y[0] + Unit_Size;
			break;
		case 'L':
			x[0] = x[0] - Unit_Size;
			break;
		}
		
	}
	public void checkPrey() {
		if((x[0] == preyX)&&(y[0] == preyY)) {
			bodyParts++;
			preyEaten++;
			newPrey();
		}
	
	}
	public void checkCollisions() {
		for(int i = bodyParts; i>0;i--) {
			if((x[0] == x[i])&& (y[0] == y[i])) {
				running = false;
			}
		}
		if(x[0] < 0 || y[0] < 0 ) {
			running = false;
		}
		if(x[0] > Screen_Width ) {
			running = false;
		}
		
		if(y[0] > Screen_Height ) {
			running = false;
		}
		if(!running) {
			timer.stop();
		}
	}
	public void gameOver( Graphics g) {
		g.setColor(Color.red);
		g.setFont(new Font("Garamond",Font.BOLD, 75));
		FontMetrics metrics = getFontMetrics(g.getFont());
		g.drawString("Game Over", (Screen_Width - metrics.stringWidth("Game Over"))/2, Screen_Height/2);
		g.setColor(Color.green);
		g.drawString("High Score: " + preyEaten, (Screen_Width - metrics.stringWidth("Game Over"))/2, Screen_Height);
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if(running) {
			move();
			checkPrey();
			checkCollisions();
		}
		repaint();
		
	}
	public class MyKeyAdapter extends KeyAdapter{
		@Override
		public void keyPressed(KeyEvent e) {
			switch(e.getKeyCode()) {
			case KeyEvent.VK_LEFT:
				if(direction != 'R') {
					direction = 'L';
				}
				break;
			case KeyEvent.VK_RIGHT:
				if(direction != 'L') {
					direction = 'R';
				}
				break;
			case KeyEvent.VK_UP:
				if(direction != 'D') {
					direction = 'U';
				}
				break;
			case KeyEvent.VK_DOWN:	
				if(direction != 'U') {
					direction = 'D';
				}
				break;
			}
		}
	}

}
