package com.badlogic.Maverick;
import java.util.Iterator;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.Screen;
import com.badlogic.gdx.assets.AssetManager;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.audio.Music;
import com.badlogic.gdx.audio.Sound;
import com.badlogic.gdx.graphics.OrthographicCamera;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.math.MathUtils;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.math.Vector3;
import com.badlogic.gdx.utils.Array;
import com.badlogic.gdx.utils.ScreenUtils;
import com.badlogic.gdx.utils.TimeUtils;
import com.badlogic.gdx.maps.tiled.*;
import com.badlogic.gdx.maps.tiled.objects.*;
public class GameScn implements Screen {
	final Maverick game;
	AssetManager am = new AssetManager();

	Texture MapImage;
	Texture AppleImage;
	Texture SnakeHd;
	Texture SnakeBd;
	Texture SnakeT;
	Sound eatSound;
	Music forestMusic;
	OrthographicCamera camera;
	Rectangle Snake;
	//Array<Rectangle> SnakeBody;
//	Rectangle SnakeB;
//	Rectangle SnakeC;
	Array<Rectangle> Apples;
	long lastDropTime;
	int ApplesGathered;
	int BodyCount=1;
	TiledMap map;
	
	public GameScn(final Maverick game) {
		this.game = game;
			
		
		 	MapImage = new Texture(Gdx.files.internal("Map1testjap.png"));
		   AppleImage = new Texture(Gdx.files.internal("cattest.png"));
		   SnakeHd = new Texture(Gdx.files.internal("test1.png"));
		   SnakeBd = new Texture(Gdx.files.internal("test1.png"));
		   SnakeT = new Texture(Gdx.files.internal("test1.png"));
		  // map = new TiledMap(Gdx.files.internal(maptest1.TMX));

		   eatSound = Gdx.audio.newSound(Gdx.files.internal("eatApple.mp3"));
		   forestMusic = Gdx.audio.newMusic(Gdx.files.internal("frstAmb.mp3"));

		  
		   forestMusic.setLooping(true);
		 

		
		camera = new OrthographicCamera();
		camera.setToOrtho(false, 800, 480);

		
		Snake = new Rectangle();
		Snake.x = 800 / 2 - 64 / 2; 
		Snake.y = 200;
		Snake.width = 64;
		Snake.height = 64;	

		
			/*   SnakeB = new Rectangle();
			   SnakeB.x = Snake.x;
			   SnakeB.y = Snake.y-64;
			   SnakeB.width = 64;
			   SnakeB.height = 64;
			
		
			   
			   SnakeC = new Rectangle();
			   SnakeC.x = Snake.x;
			   SnakeC.y = Snake.y-(64*2);
			   SnakeC.width = 64;
			   SnakeC.height = 64;*/
		Apples = new Array<Rectangle>();
		spawnApples();
		
	}
	
	private void spawnApples() {
		Rectangle Apple = new Rectangle();
		Apple.x = MathUtils.random(0, 800 - 64);
		Apple.y = MathUtils.random(0, 480 - 64);;
		Apple.width = 64;
		Apple.height = 64;
		Apples.add(Apple);
		lastDropTime = TimeUtils.millis();
		
	}
	/*private void snakeEats() {
	
		Rectangle SnakeB1= new Rectangle();
			SnakeB1.x = SnakeB.x;
		   SnakeB1.y = SnakeB.y-64*BodyCount;
		   SnakeB1.width = 64;
		   SnakeB1.height = 64;
		   SnakeBody.add(SnakeB1);
		   game.batch.draw(SnakeBd, SnakeB1.x, SnakeB1.y, Snake.width, Snake.height);
		
	}*/
	

	@Override
	public void render(float delta) {
		ScreenUtils.clear(0, 0, 0.2f, 1);
		camera.update();
		game.batch.setProjectionMatrix(camera.combined);
		game.batch.begin();
		game.batch.draw(MapImage,0,0);
		game.font.draw(game.batch, "Apples Eaten: " + ApplesGathered, 0, 480);
		game.batch.draw(SnakeHd, Snake.x, Snake.y, Snake.width, Snake.height);
		game.batch.draw(SnakeBd, Snake.x, Snake.y-64, Snake.width, Snake.height);
		for(int i=0; i< BodyCount; ++i) {
			game.batch.draw(SnakeBd, Snake.x, Snake.y-64*(i+1), Snake.width, Snake.height);
		}
		
		game.batch.draw(SnakeT, Snake.x, Snake.y-64*(BodyCount+1), Snake.width, Snake.height);
		for (Rectangle Apple : Apples) {
			game.batch.draw(AppleImage, Apple.x, Apple.y);
		}
		game.batch.end();
		if (Gdx.input.isTouched()) {
			Vector3 touchPos = new Vector3();
			touchPos.set(Gdx.input.getX(), Gdx.input.getY(), 0);
			camera.unproject(touchPos);
			Snake.x = touchPos.x - 64 / 2;
			Snake.y = touchPos.y - 64 / 2;
		}
		if (Gdx.input.isKeyPressed(Keys.LEFT))
			Snake.x -= 200 * Gdx.graphics.getDeltaTime();
		if (Gdx.input.isKeyPressed(Keys.RIGHT))
			Snake.x += 200 * Gdx.graphics.getDeltaTime();
		if(Gdx.input.isKeyPressed(Input.Keys.UP)) 
			Snake.y += 200 * Gdx.graphics.getDeltaTime();
		if(Gdx.input.isKeyPressed(Input.Keys.DOWN)) 
			 Snake.y -= 200 * Gdx.graphics.getDeltaTime();
		if (Snake.x < 0)
			Snake.x = 0;
		if (Snake.x > 800 - 64)
			Snake.x = 800 - 64;
		if (Snake.y < 0)
			Snake.y = 0;
		if (Snake.y > 480 - 64)
			Snake.y = 480 - 64;
		if (TimeUtils.millis() - lastDropTime > 3000)
			spawnApples();
		Iterator<Rectangle> iter = Apples.iterator();
		while (iter.hasNext()) {
			Rectangle Apple = iter.next();
			Apple.y -= 0 * Gdx.graphics.getDeltaTime();
			if (Apple.y + 64 < 0)
				iter.remove();
			if (Apple.overlaps(Snake)) {
				ApplesGathered++;
				BodyCount++;
				eatSound.play();
				
				iter.remove();
				
			}
	}
	}
	@Override
	public void resize(int width, int height) {
	}

	@Override
	public void show() {
		forestMusic.play();
	}

	@Override
	public void hide() {
	}

	@Override
	public void pause() {
	}

	@Override
	public void resume() {
	}

	@Override
	public void dispose() {
		MapImage.dispose();
		AppleImage.dispose();
		SnakeHd.dispose();
		SnakeBd.dispose();
		SnakeT.dispose();
		eatSound.dispose();
		forestMusic.dispose();
	}

}


